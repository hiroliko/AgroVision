#include "NemSensoru.h"
#include <Arduino.h>

NemSensoru::NemSensoru(int analogPin)
{
  pin = analogPin;
}

int NemSensoru::nemOku()
{
  return analogRead(pin);
}