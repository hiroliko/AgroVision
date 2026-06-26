#ifndef NEMSENSORU_H
#define NEMSENSORU_H

class NemSensoru
{
  private:
    int pin;

  public:
    NemSensoru(int p);
    int nemOku();
};

#endif