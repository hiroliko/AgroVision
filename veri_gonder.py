import serial
import requests

arduino = serial.Serial("COM7",9600)

while True:

    veri = arduino.readline().decode().strip()

    try:

        nem, durum = veri.split(",")

        requests.get(
            f"http://localhost/akilli-tarim/arduino_veri.php?nem={nem}&durum={durum}"
        )

        print("Gonderildi:", nem, durum)

    except:
        pass