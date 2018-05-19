// Them thu vien ESP8266
#include <ESP8266WiFi.h>
// Thong so Wifi
const char* ssid = "Choa38";      //Ten wifi nha ban
const char* password = "123456789";   //Mat khau wifi nha ban
// Host
const char* host = "davdk.herokuapp.com"; //Trang web de lay du lieu
void setup() {
// Khoi dong Serial
  Serial.setDebugOutput(true);
  Serial.begin(115200);
  delay(10);
  pinMode(0, OUTPUT);
  pinMode(2, OUTPUT);
  pinMode(3, OUTPUT);
  pinMode(4, OUTPUT);
  //pinMode(16, OUTPUT);
// Ket noi voi mang wifi
  Serial.println();
  Serial.println();
  Serial.print("Ket noi toi mang wifi ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi da ket noi");
  Serial.println("Dia chi IP: ");
  Serial.println(WiFi.localIP()); //In ra dia chi IP
}
int value = 0;
void loop() {
  Serial.print("Ket noi toi web ");
  Serial.println(host);
// Su dung lop WiFiClient de tao ket noi TCP
  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {    //Kiem tra neu khong ket noi dc thi in thong bao
    Serial.println("Khong ket noi duoc");
    return;
  }
// Gui yeu cau toi server
  client.print(String("GET /device.json") + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n");
  delay(500);
// Doc het cac phan hoi tu server va in ra Serial
String line;
  while (client.available()) {
    line = client.readStringUntil('\R');
    //Serial.print(line);
  }
  //Serial.print(line.length());
  String D01 = line.substring(92,93);
  Serial.println("Gia tri tai D01:"+ D01);
  String D02 = line.substring(102,103);
  Serial.println("Gia tri tai D02:"+ D02);
  String D03 = line.substring(112,113);
  Serial.println("Gia tri tai D03:"+ D03);
  String D04 = line.substring(122,123);
  Serial.println("Gia tri tai D04:"+ D04);
  //-----------------D01--------------------//
  if(D01 =="1")
    {digitalWrite(0, LOW);} 
  else
    {digitalWrite(0, HIGH);}
  Serial.println();
  //-----------------D02------------------//
  if(D02 =="1")
    {digitalWrite(2, LOW);} 
  else
    {digitalWrite(2, HIGH);}
  Serial.println();
  //-----------------D03-------------------//
  if(D03 =="1")
    {digitalWrite(3, LOW);} 
  else
    {digitalWrite(3, HIGH);}
  Serial.println();
  //-----------------D04--------------------//
  if(D04 =="1")
    {digitalWrite(4, LOW);} 
  else
    {digitalWrite(4, HIGH);}
  Serial.println();
}

