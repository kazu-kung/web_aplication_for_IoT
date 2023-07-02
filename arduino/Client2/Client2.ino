#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClientSecureBearSSL.h>
#include <Wire.h>
#include <WiFiClient.h>
#include <ArduinoJson.h>
#include <DHT.h>

const char* ssid = "PCCLoei_Dormitory_WiFi";
const char* password = "";
const char* serverName = "http://172.20.9.164/project/connect.php?ID=1";

#define SEALEVELPRESSURE_HPA (1013.25)

const int led1 = 1;
const int led2 = 2;
const int led3 = 3;
const int dhtPin = 5;

DHT dht(dhtPin, DHT22);

void setup() {
  Serial.begin(115200);

/**********write pin module**********/
  pinMode(led1, OUTPUT);
  digitalWrite(led1,LOW);
  pinMode(led2, OUTPUT);
  digitalWrite(led2,LOW);
  pinMode(led3, OUTPUT);
  digitalWrite(led3,LOW);

  //pinMode(pin, OUTPUT or INPUT)
/************************************/

  WiFi.begin(ssid, password);
  Serial.println("Connecting");

  while(WiFi.status() != WL_CONNECTED) { 
    Serial.println(WiFi.status());
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  StaticJsonBuffer<200> jsonBuffer;
  if(WiFi.status()== WL_CONNECTED){
    std::unique_ptr<BearSSL::WiFiClientSecure>client(new BearSSL::WiFiClientSecure);
    client->setInsecure();
    WiFiClient WifiClient;
    HTTPClient https;
    https.begin(WifiClient,"http://172.20.9.164/project/connect.php?ID=2");
    int httpCode = https.GET();
    Serial.println(httpCode);

    if(httpCode == HTTP_CODE_OK) {
      Serial.print("HTTP response code ");
      Serial.println(httpCode);
      String response = https.getString();
      Serial.println(response);
      JsonObject& root = jsonBuffer.parseObject(response);
    }
    
    if (httpCode > 0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpCode);
    } else {
      Serial.print("Error code: ");
      Serial.println(httpCode);
    }
    https.end();
  } else {
    Serial.println("WiFi Disconnected");
  }


String sensor = root["data_i"];
      if (sensor == "ON"){ 
        digitalWrite(ledPin,HIGH);
        Serial.println("1");
      }else{ 
        digitalWrite(ledPin,LOW);
        Serial.println("0");
      }

/***********write function***********/
  
/************************************/

  delay(10000);  
}

void digiWrite(String a, int b){
  String sensor = root[a];
  if (sensor == "ON"){ 
    digitalWrite(b,HIGH);
  }else{ 
    digitalWrite(b,LOW);
  }
}

int digiRead(int c){
  return digitalRead(c);
}

void anaWrite(String d){
  String sensor = root[d];
  analogWrite(e, sensor);
}

int anaRead(int f){
  return analogRead(f);
}

void dhtModule(){

}

void esppost(){
  int httpCode_p = https.POST(JSON);
  Serial.println(httpCode_p);
  if (httpCode_p > 0) {
    Serial.print("HTTP POST code: ");
    Serial.println(httpCode_p);
    if(httpCode_p == HTTP_CODE_OK) {
      String payload = https.getString();
      Serial.println(payload);
    }
  } else {
    Serial.print("Error code: ");
    Serial.println(httpCode_p);
  }
}






















