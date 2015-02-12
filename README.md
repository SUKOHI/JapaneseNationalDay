JapaneseNationalDay
=====
PHP class for Label to manage Japanese national days.

Installation&setting for Laravel
====

After installation using composer, add the followings to the array in  app/config/app.php

    'providers' => array(  
        ...Others...,  
        'Sukohi\JapaneseNationalDay\JapaneseNationalDayServiceProvider',
    )

Also

    'aliases' => array(  
        ...Others...,  
        'JapaneseNationalDay' => 'Sukohi\JapaneseNationalDay\Facades\JapaneseNationalDay',
    )

Usage
====

**Get National days**

	$national_days = JapaneseNationalDay::get($year = 2014);  // $year is skippable.
	dd($national_days);

**Remove cache**

    JapaneseNationalDay::removeCache($year = 2014); // $year is skippable.
    
License
====
This package is licensed under the MIT License.  
Copyright 2015 Sukohi Kuhoh