#include <SPI.h>
#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>

#include "NemSensoru.h"
#include "DurumAnalizi.h"

#define SCREEN_WIDTH 128
#define SCREEN_HEIGHT 64

#define OLED_MOSI 11
#define OLED_CLK 13
#define OLED_DC 8
#define OLED_CS 10
#define OLED_RESET 9

Adafruit_SSD1306 display(
  SCREEN_WIDTH,
  SCREEN_HEIGHT,
  OLED_MOSI,
  OLED_CLK,
  OLED_DC,
  OLED_RESET,
  OLED_CS
);

NemSensoru sensor(A0);

void setup() {

  Serial.begin(9600);

  if (!display.begin(SSD1306_SWITCHCAPVCC)) {
    while (true);
  }

  display.clearDisplay();
  display.setTextColor(SSD1306_WHITE);

  display.setTextSize(2);
  display.setCursor(10, 20);
  display.println("TOPRAK");

  display.setCursor(20, 42);
  display.println("NEMI");

  display.display();

  delay(2000);
}

void loop() {

  int deger = sensor.nemOku();

  int yuzde = map(deger, 1023, 330, 0, 100);
  yuzde = constrain(yuzde, 0, 100);

  String durum = durumBelirle(yuzde);
  String oneri = suOnerisi(yuzde);
  // Siteye veri gönder
Serial.print(yuzde);
Serial.print(",");
Serial.println(durum);

  display.clearDisplay();

  display.setTextColor(SSD1306_WHITE);

  // Başlık
  display.setTextSize(1);
  display.setCursor(0, 0);
  display.print("TOPRAK NEMI");

  // Nem
  display.setCursor(0, 18);
  display.print("Nem: %");
  display.print(yuzde);

  // Durum
  display.setCursor(0, 34);
  display.print("Durum: ");
  display.print(durum);

  // Su önerisi
  display.setCursor(0, 50);
  display.print("Su: ");
  display.print(oneri);

  // Emoji çerçevesi
  display.drawCircle(108, 24, 12, SSD1306_WHITE);

  // Gözler
  display.fillCircle(104, 20, 1, SSD1306_WHITE);
  display.fillCircle(112, 20, 1, SSD1306_WHITE);

  if (yuzde >= 30 && yuzde <= 80) {

    // Mutlu ağız
    display.drawLine(102, 28, 106, 31, SSD1306_WHITE);
    display.drawLine(106, 31, 110, 31, SSD1306_WHITE);
    display.drawLine(110, 31, 114, 28, SSD1306_WHITE);

  } else {

    // Üzgün ağız
    display.drawLine(102, 31, 106, 28, SSD1306_WHITE);
    display.drawLine(106, 28, 110, 28, SSD1306_WHITE);
    display.drawLine(110, 28, 114, 31, SSD1306_WHITE);
  }

  display.display();

  delay(1000);
}