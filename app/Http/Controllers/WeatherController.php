<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class WeatherController extends Controller
{
   
	// главная страница
    public function index()
    {
    	return view('start');
    }

    // Отправить писмо и показывает результат
    public function send(Request $request)
    {
        // проверка данных
    	$request->validate([

    			     'name' => 'required|max:255|',
    				 'email' => 'required|max:100|email',

 				]);
    	 
    	$name = $request->input('name');
    	$email = $request->input('email');
    	
        //получаем погоду
    	$weather = $this->getWeather();
    	$date = date('G : i : s');
    	$data = [
    			'weather' => $weather, 
    			'date' => $date,
    			'name' => $name
    			];

    	// отправка писмо пользователью 
    	Mail::send('email_message', $data, function($message) use ($name,$email){
    		$message->to($email, $name)->subject('Погода в Москве');
    		$message->from(env('MAIL_USERNAME'), 'Погода в Москве');
    	}); 

        // вернем резултьтат
    	return view('success')->with(['weather' => $weather, 'date' => $date, 'success'=>'Успешно отправлено!']);
    	

    }

    // получаем погоду
    private function getWeather()
    {
    	$apiKey = env('APIKEY', "NOAPPID");
		// Город погода которого нужна
		$city = config('api.city');
		$lang = config('api.lang');
		// Ссылка для отправки
		 $url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&lang=". $lang ."&units=metric&appid=" . $apiKey;
		$ch = curl_init();
		// Настройка запроса
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		// Отправляем запрос и получаем ответ
		$data = json_decode(curl_exec($ch));
		// Закрываем запрос
		curl_close($ch);
		return $data;	
    }

   
}
