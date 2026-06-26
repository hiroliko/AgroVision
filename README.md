🌱 AgroVision - Akıllı Tarım Sistemi

Proje Tanıtımı

AgroVision, toprak nemini gerçek zamanlı olarak takip edebilen IoT (Nesnelerin İnterneti) tabanlı bir akıllı tarım sistemidir. Bu proje, Arduino ile alınan sensör verilerini Python aracılığıyla PHP tabanlı web sitesine aktararak kullanıcıların toprak durumunu internet üzerinden anlık olarak takip edebilmesini sağlamaktadır.

Sistem sayesinde topraktaki nem oranı sürekli ölçülür, OLED ekranda görüntülenir ve aynı zamanda MySQL veritabanına kaydedilir. Web sitesi üzerinden kullanıcılar güncel nem durumunu, toprak analizini ve geçmiş ölçümleri görüntüleyebilirler.

⸻

Projenin Amacı

Bu projenin temel amacı;

* Toprak nemini gerçek zamanlı olarak ölçmek,
* Gereksiz sulamanın önüne geçmek,
* Kullanıcıya sulama konusunda bilgi vermek,
* Sensör verilerini internet ortamında yayınlamak,
* IoT teknolojisinin tarım alanındaki kullanımını göstermektir.

⸻

Sistemin Çalışma Mantığı

Sistem aşağıdaki sırayla çalışmaktadır:

Toprak Nem Sensörü

↓

Arduino Uno

↓

OLED Ekran

↓

Python Programı (Seri Haberleşme)

↓

PHP Web Sitesi

↓

MySQL Veritabanı

↓

Kullanıcı Arayüzü

⸻

Kullanılan Donanımlar

Projede kullanılan donanımlar şunlardır:

* Arduino Uno
* Toprak Nem Sensörü
* 0.96” OLED SSD1306 Ekran
* Breadboard
* Jumper Kablolar
* USB Kablosu
* Bilgisayar

⸻

Kullanılan Yazılım Dilleri

Projede aşağıdaki programlama dilleri kullanılmıştır:

* C++
* Python
* PHP
* HTML5
* CSS3
* JavaScript
* SQL

⸻

Kullanılan Programlar

Proje geliştirilirken aşağıdaki programlardan yararlanılmıştır:

* Arduino IDE
* Visual Studio Code
* Python 3
* XAMPP
* phpMyAdmin
* MySQL
* Google Chrome
* GitHub

⸻

Çalışma Şekli

1. Toprak nem sensörü toprağın nem oranını ölçer.
2. Arduino sensörden gelen analog veriyi okur.
3. Okunan değer yüzde (%) olarak hesaplanır.
4. Nem oranına göre toprağın durumu belirlenir.
5. OLED ekranda nem yüzdesi ve toprak durumu gösterilir.
6. Arduino aynı veriyi seri port üzerinden bilgisayara gönderir.
7. Python programı bu veriyi okuyarak PHP dosyasına gönderir.
8. PHP dosyası veriyi MySQL veritabanına kaydeder.
9. Web sitesi belirli aralıklarla yenilenerek en güncel bilgileri kullanıcıya gösterir.

⸻

Toprak Durumu Kategorileri

Toprak nem oranına göre sistem üç farklı kategori oluşturur:

* Kuru
* Normal
* Çok Islak

Buna göre kullanıcıya sulama önerisi sunulur.

⸻

Web Sitesinin Özellikleri

Web sitesi aşağıdaki özelliklere sahiptir:

* Kullanıcı giriş sistemi
* Gerçek zamanlı toprak nemi görüntüleme
* Toprak durumunu gösterme
* Sulama önerisi sunma
* Bitki kütüphanesi
* Sensör geçmişini görüntüleme
* Modern ve kullanıcı dostu arayüz
* Otomatik veri güncelleme

⸻

Veri Güncelleme

Arduino sürekli olarak sensör verisini okumaktadır.

Python programı bu verileri anlık olarak PHP sistemine göndermektedir.

Web sitesi 5 saniyede bir otomatik olarak yenilenmekte ve en güncel sensör verisini göstermektedir.

⸻

Veritabanı

Projede MySQL veritabanı kullanılmıştır.

Veritabanında aşağıdaki bilgiler saklanmaktadır:

* Toprak nem yüzdesi
* Toprak durumu
* Ölçüm tarihi
* Ölçüm saati

⸻

Kullanıcı Giriş Sistemi

Projede giriş yapabilen dört farklı kullanıcı bulunmaktadır.

* Admin
* Hira
* Öğretmen
* Misafir

Bu kullanıcılar sisteme giriş yaparak web arayüzünü kullanabilmektedir.

⸻

Kullanılan Teknolojiler

* Arduino
* IoT (Nesnelerin İnterneti)
* Seri Haberleşme
* PHP
* Python
* MySQL
* HTML
* CSS
* JavaScript

⸻

Projenin Sağladığı Avantajlar

* Gerçek zamanlı takip
* Uzaktan erişim imkanı
* Gereksiz sulamayı azaltma
* Su tasarrufu sağlama
* Kullanıcı dostu arayüz
* Verilerin güvenli şekilde saklanması
* Donanım ve yazılımın birlikte çalışmasını sağlaması

⸻

Proje Geliştiricileri

Bu proje üniversite bitirme/proje dersi kapsamında geliştirilmiştir.

⸻

Lisans

Bu proje eğitim amaçlı geliştirilmiştir.
