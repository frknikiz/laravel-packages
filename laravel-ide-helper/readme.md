# Laravel İde-Helper #

Merhaba arkadaşlar,

Bugün sizlerle belkide laravelin en çok kullanılan paketi olan ide helper'ı inceleyeğiz.

## Ne işe yarar ? ##

İde helper paketi isminden de anlayabileceğimiz gibi laravel ile proje geliştirirken kullandığımız ide'ye yardımcı olmaya çalışan bir pakettir.

Ben ide olarak PhpStorm kullanıyorum(Herkese tavsiye ederim). Bir laravel projesini standart olarak oluşturduğunuzda özellikle kod tamamlama düzgün çalışmaz.

Örneğin, yazmak istediğiniz fonksiyon `View::make()` dir ama siz `View` yazdığınızda ide size istediğiniz önerileri sunmayabilir;

![](http://www.furkanikiz.com.tr/assets/blogresim/images/Yazi%20Resimleri/ide-helper-1.png)

Bunun sebebi idelerin Laravel Framework'e halen daha tam entegrasyonu tamamlamamış olmalarıdır. 
> Belki entegrasyon tamamlandığında bu paketede gerek kalmayacak.


Bu gibi durumları laravel-ide helper ile aşabiliyoruz.

## Kullanımı ##

composer.json eklememizi yapıyoruz:

	..	
	"require": {
		"laravel/framework": "4.2.*",
        "barryvdh/laravel-ide-helper":"~1.11"
	}..

> Yukarıdaki paket Laravel 4.2 versiyonu içindir. 5.0 ve üstü için `"barryvdh/laravel-ide-helper":"dev-master"` kullanabilirsiniz.

daha sonra app/config/app.php içerine ServiceProvider'ı eklemeliyiz ;

	'providers' => array(
		..
		'Illuminate\Workbench\WorkbenchServiceProvider',
        'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider',
	),

Şimdi `composer update` komutunu çalıştırıp gerekli dosyaları çekiyoruz.

Son olarak `php artisan ide-helper:generate` ile helperımızı generate ettik.

Bu generate etme işlemi her `composer update` den sonra çalıştırılmalıdır ki yeni eklenen kütüphaneler kod tamamlamaya dahil olabilsin.

Tabiki bunuda otomatikleştirebiliriz. Bunun için composer.json dosyamızda küçük bir düzeltme yapmalıyız ;

	"scripts":{
    "post-update-cmd":[
        "php artisan clear-compiled",
        "php artisan ide-helper:generate",
        "php artisan optimize"
    ]
	},

Artık idemizde kulladığımız tüm paketler,controller,modeller ve kütüphanelerin kod tamamlaması düzgün bir şekilde çalışacak.


![](http://www.furkanikiz.com.tr/assets/blogresim/images/Yazi%20Resimleri/ide-helper-2.png)


Başka bir yazıda görüşmez üzere..