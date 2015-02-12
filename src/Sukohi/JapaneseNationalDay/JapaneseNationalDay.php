<?php namespace Sukohi\JapaneseNationalDay;

class JapaneseNationalDay {

	public static function get($year = null) {
		
		if($year == null) {
			
			$year = date('Y');
			
		}
		
		return \Cache::rememberForever('japanese-national-days-'. $year, function() use($year) {
			
			$national_days = [];
			$url = 'https://www.google.com/calendar/feeds/'. urlencode('japanese__ja@holiday.calendar.google.com') .'/public/basic'.
					'?start-min='. date($year .'-01-01\T00:00:00\Z') .
					'&start-max='. date($year .'-12-31\T00:00:00\Z') .'&max-results=30&alt=json';
	
			if($json = file_get_contents($url)) {
				
				$json_data = json_decode($json, true);
				
				if(!empty($json_data['feed']['entry'])) {
					
					foreach ($json_data['feed']['entry'] as $value) {
						
						$title = $value['title']['$t'];
						$date = preg_replace('#\A.*?(2\d{7})[^/]*\z#i', '$1', $value['id']['$t']);
						$date2 = preg_replace('/\A(\d{4})(\d{2})(\d{2})/', '$1-$2-$3', $date);
						$national_days[$date2] = $title;
						
					}
					
					ksort($national_days);
					return $national_days;
					
				}
				
			}
			
			return $national_days;
			
		});
		
	}
	
	public static function removeCache($year = null) {

		if($year == null) {
				
			$year = date('Y');
				
		}
		
		\Cache::forget('japanese-national-days-'. $year);
		
	}

}