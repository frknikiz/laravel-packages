# Composer'da Git Repolarının Kullanımı #

Merhaba Arkadaşlar,

Bu yazıda sizlere psr standartlarında olmayan bir sınıfı yada kütüphaneyi composerda nasıl kullacağımızı anlatacağım.

## Örnek Repo ##

Aşağıdaki linkteki repoyu composer'la kullanmak istiyoruz diyelim:

[https://github.com/nuovo/vCard-parser](https://github.com/nuovo/vCard-parser "vCart-parser")


> Zaten bende yukarıdaki kütüphaneyi composera dahil etmeye çalışırken öğrenmiştim bu yöntemi :)


Repoyu bize lazım olan dosya vCart.php.

Öncelikle composer.json dosyasında repoyu bir packages olarak tanıtmalıyız:

	...
	"require": {...},
	"repositories": [
      {
        "type": "package",
        "package": {
          "name": "nuovo/vCard-parser",
          "version": "dev-master",
          "source": {
            "url": "https://github.com/nuovo/vCard-parser",
            "type": "git",
            "reference": "origin/master"
          }
        }
      }
    ]
	...
	

Yukarıda gördüğünüz gibi ekleme işlemini "require" parametresinden sonra yaptım.
Burada aslında sadece bu composer.json da tanımlı bir paket oluşturdum.Oluşturduğum paketin ismi `nuovo/vCard-parser` oldu. Şimdi bu paketi "require" kısmında tanımlayıp kullanabilirim.

	"require": {
		..
        "nuovo/vCard-parser": "dev-master",
		..
    }

Artık composer.json dosyamızı çalıştırdığımızda, kütüphaneyi vendor içerisine indirecek. İndirilecek kütüphanede autoload dosyasına dahil olmasını istediğimiz dosya neyse bunu composer.json içerisinde şu şekilde tanımlıyoruz;

	..
	"autoload":{
        "files": ["vendor/nuovo/vCard-parser/vCard.php"]
      }
	..

Dosyanın son hali şu şekilde olmalı;

	...
	"require": {
        "nuovo/vCard-parser": "dev-master"
    },
    "autoload":{
        "files": ["vendor/nuovo/vCard-parser/vCard.php"]
      },
    "repositories": [
      {
        "type": "package",
        "package": {
          "name": "nuovo/vCard-parser",
          "version": "dev-master",
          "source": {
            "url": "https://github.com/nuovo/vCard-parser",
            "type": "git",
            "reference": "origin/master"
          }
        }
      }
    ]
	...

Artık `composer update` komutunu çalıştırdığımızda git üzerindeki repo indirilip, autoload içerisine dahil edilecektir.

Örnek Proje için daha önce yazmış olduğum vCart-to-Database Reposunu inceleyebilirsiniz;

Link : [https://github.com/frknikiz/Vcart-to-DataBase](https://github.com/frknikiz/Vcart-to-DataBase "vCart-to-Database")


Başka bir yazıda görüşmek üzere..
