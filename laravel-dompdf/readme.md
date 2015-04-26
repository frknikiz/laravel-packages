## laravel-dompdf

Laravel-dompdf Pdf oluşturma işlemleri basitleştiren bir laravel paketidir. 

## Paketi Projeye Dahil Etme

composer.json dosyamızda "require" kısmına  "barryvdh/laravel-dompdf": "0.5.*"
satırını ekliyoruz.

   
	"require": {
		"laravel/framework": "4.2.*",
        "barryvdh/laravel-dompdf": "0.4.*"
	},

config/app.php dosyasına providers dizisine `'Barryvdh\DomPDF\ServiceProvider',` satırını ekliyoruz

	'providers' => array(
		..
		'Illuminate\Workbench\WorkbenchServiceProvider',
		'Barryvdh\DomPDF\ServiceProvider',
	),

config/app.php dosyasına kütüphaneyi çağırırken kullanacağımız Aliases'ı ekliyoruz ` 'PDF'=> 'Barryvdh\DomPDF\Facade',`

		'aliases' => array(
		..
		'View'            => 'Illuminate\Support\Facades\View',
      	'PDF' 			  => 'Barryvdh\DomPDF\Facade',
	),


Ayarlamalarımız yaptıktan sonra artık `composer update` komutu ile ilgili kütüphaneyi çekiyoruz ve artık paketi kullanabiliriz.

Bu paketin en beğendiğim özelliği oluştuğunuz bir view html halinden pdf'e çevirebilmesi. 

Bu sayede pdf işlerken html ve css kullarak istediğimiz görünümü elde edip kolaylıkla pdf çıktı verebiliyoruz.


# Kullanımı #

Paketin bir çok kullanımı var. Bu yazıda ben dinamik bir view dosyasından pdf görüntüleme ve indirme işlemlerini anlatacağım.

Bunun için tablo.blade.php adında örnek bir view dosyası oluşturdum.(Tablonun html ve css kodlarını W3school'dan aldım :))

Pdf nesnesine view dosyasını yüklemek için aşağıdaki kodu kullanıyorum:

	$pdf = PDF::loadView('tablo');

Kütüphanedeki `loadView` fonksiyonu laravel 4.2 deki `View::make()` fonksiyonu ile aynı şekilde çalışıyor.

Birinci parametrede hangi view dosyasını çağıracağınızı,ikinci parametrede ise göndereceğiniz veriyi array olarak belirtiyorsunuz.

Oluşturduğumuz pdf nesnesini tarayıcıda görüntülemek istersek aşağıdaki komutu:

	return $pdf->stream();

Eğer kullanıcının indirmesini isterseniz:

	return $pdf->download('dosyaismi.pdf');

komutlarını kullanıyoruz.

Uyarı: View dosyasından pdf'e dönüşüm yaparken türkçe karakter sorunlarını engellemek için

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

meta tagını view dosyamıza eklemeliyiz.

Not:Html ve css yazarken cssleri dışardan çağırmak yerine dosya içerisine yazmanızı tavsiye ederim. Bazen sıkıntı çıkarabiliyor. Mümkün olduğunca az html ve css kullanmaya dikkat ediniz.

# Diğer fonksiyonlar #

Eğer oluşturduğumuz pdf dosyasını sunucuda bir alana kaydetmek istersek;

	$pdf->save('dosya/yolu/dosyaadi.pdf');
	
Kağıt tipini ayarlamak istersek;

	$pdf->setPaper('a4');

Pdf yönlendirmesini ayarlamak istersek;
	$pdf->setOrientation('landscape');

komutlarını kullanabiliriz.

Paket Kaynağı :

[https://github.com/barryvdh/laravel-dompdf/tree/0.4](https://github.com/barryvdh/laravel-dompdf/tree/0.4 "Paketin Github Linki")