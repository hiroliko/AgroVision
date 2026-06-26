#include "DurumAnalizi.h"

String durumBelirle(int yuzde)
{
  if (yuzde < 30)
    return "KURU";

  if (yuzde > 80)
    return "COK ISLAK";

  return "NORMAL";
}

String suOnerisi(int yuzde)
{
  if (yuzde < 30)
    return "Su Ver";

  if (yuzde > 80)
    return "Su Verme";

  return "Ideal";
}