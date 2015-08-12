# Laravel Model Validation #

Web tabanlı bir sistem kodlarken en çok dikkat edilmesi gereken yer, kullanıcıdan gelen verilerdir.

Bu verilerin kayıtlarını yaparken, en az uğraşla en güvenli yapıyı üzerinden kontrolleri sağlamak projemiz için önemlidir.

Örneğin sayı gelmesi gereken bir alana metin tipinde veri gelmesi yazdığımız sistemde hata oluşmasına neden olacaktır.

Yazılımcı bu tarz durumları engellemek için kullanıcıdan gelen tüm verileri kaydetmeden önce belli kriterlerde kontrol etmeli ve buna göre kayıt etmelidir.

Fakat her post veya get istediğinde gelen verileri ayrı ayrı kontrol etmek hem hata olasılığını yükseltir, hemde süreci uzatır.

İşte bu tarz sorunları ortadan kaldırmak için Laravel framework paketi olan Model Validation'ı kullanabiliriz.

## Nedir ? ##

Model Validation, laravel çatısında model dosyalarınıza kriterler girmenize olanak sağlıyor. Böylece siz o model ile veri kaydı yaparken girdiğiniz verileri ve kriterleri karşılaştırıp, hata varsa bununla ilgili hata mesajı gönderebiliyor.


## Kullanımı ##

Her zamanki gibi composer dosyamıza eklemelerimizi yapıyoruz.

	{
	    "require": {
	        ..
	        "way/database": "dev-master"
			..
	    }
	}

Daha sonra modeller için kalıtım alacağımız classın kısaltmasını ve yolunu app/config/app.php dosyasındaki `aliases` arrayın'a ekliyoruz;
 

	'Model' => 'Way\Database\Model'

> Eğer bu tanımlamayı `Model` olarak alırsanız `class User extends Model {}` şeklinde kullanmalısınız. 
>Fakat ben bunun yerine ` 'Eloquent' => 'Illuminate\Database\Eloquent\Model'` tanımlamasını değiştiriyorum. Böylece standart olarak tüm modellerimde Model validation çalışabiliyor.

Artık `composer update`'i çalıştırıp kütüphaneyi çekiyoruz. Şimdi model dosyalarımıza rules'mızı tanımlayalım;
    
    <?php
    
    class User extends Model {
	    protected static $rules = [
	    'name' => 'required',
		'mail'=> 'requred|email'
	    ];
    
    }

Yukarıdaki User modelinde name,mail alanını zorunlu yaptık ve mail alanının  email formatında olması gerektiğini belirttik.Bu şartlara uymayan bir kayıt işlemi yapmaya çalıştığımızda bize hata mesajları gönderecektir.

> Rules kurallarını nasıl tanımlayacağınız ile ilgili laravelin [http://laravel.com/docs/4.2/validation](http://laravel.com/docs/4.2/validation "Validation") linkindeki dökümantasyonuna bakabilirsiniz. 

    $usr=new User();
    $usr->name="";
    $usr->mail="blabladeneme";
    
    if($usr->save())
    {
    	return "Kayıt Başarılı";
    }
    else
    {
    	dd($usr->getErrors());
    }

Yukarıdaki örnekte mail değeri mail formatında olmadığı için kayıt sırasında hata alacağız.

Çıktı:

    object(Illuminate\Support\MessageBag)[154]
      protected 'messages' => array (size=2)
      		'name' => array (size=1)
      			0 => string 'The name field is required.' (length=27)
      		'mail' =>array (size=1)
      			0 => string 'The mail must be a email.' (length=39)
      protected 'format' => string ':message' (length=8)

Görüldüğü gibi Model Validation default olarak bize ingilizce mesaj verdi.

Türkçe dil dosyalarını [Şu Adresten](https://github.com/laravel-tr/Laravel4-lang) indirip framework'e tanımlayabilirsiniz.

Başka bir yazıda görüşmek üzere..