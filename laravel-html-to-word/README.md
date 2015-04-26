# Laravelde View'i Word dökümanı olarak indirme#

Merhaba arkadaşlar bu yazıda sizlere bir view'i basitçe .doc uzantılı bir Word dökümanı olarak nasıl indirteceğinizden bahsedeceğim.

Aslında bu yöntem için framework kullanmamızada gerek yok fakat ben anlatımları laravel üzerinden yaptığım için verdiğim örnek kodları laravelde hazırlıyorum. 
> 
> (Aşağıdaki işlemi laravel kullanmadan yapmak isteyen arkadaşlar sadece sayfanın header kısmına aşağıdaki ` $header` array'indaki değerleri girerek aynı şekilde kullanabilirler.)

Diyelim tablo.blade.php adında bir view dosyamız var. Bu dosya gönderilen değişkenler ile dolmakta. Ve bu tabloyu kullanıcıya .doc uzantılı olarak vermek istiyoruz.

Bu işlem için laravelde bulunan `Response` nesnesi ile custom bir ` Response` oluşturuyoruz. 

Bu Response'a content parametresi olarak View'imizin render edilmiş halini gönderiyoruz.Header kısmına ise `$header` arrayını gönderiyoruz. Böylece kod çalıştığında tablo.view.php view dosyamızı dosyaismi.doc olarak indiriyoruz.

> Aslında burada yapmış olduğumuz şey; bilgisayarımızdaki deneme.html adındaki bir dosyanın adını ve uzantısını deneme.doc olarak değiştirip Word ile açmak ile aynı.

> 
## Örnek: ##


		$headers = array(
						 "Content-type"=>"text/html",
                         "Content-Disposition"=>"attachment;Filename=dosyaismi.doc"
				);

        return Response::make(View::make("tablo", self::$data)->render(), 200, $headers);


Başka bir yazıda görüşmek üzere..

    