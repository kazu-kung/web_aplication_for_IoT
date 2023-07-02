#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <Arduino_JSON.h>
#include "DHT.h"

#define ON_Board_LED 2
#define LED_D4 2
#define DHTPIN D2
#define DHTTYPE DHT22
#define LED_D0 16
#define LED_D3 0
DHT dht(DHTPIN,DHTTYPE);

// Setup Wi-Fi SSID & passworld
const char* ssid = "PCCL_Computer";
const char* password = "";

// Setup IPv4
String host_or_IPv4 = "http://pcshsloei.ac.th/";

String Destination = "";
String URL_Server = "";
String getData = "";
String postData = "";
String payloadGet = "";
String payloadSend = "";

float humidityData;
float temperatureData;
String sensorReadingsArr[6];

HTTPClient http;
WiFiClient client;

void setup() {
  Serial.begin(115200);
  dht.begin();
  delay(500);

  // Setup connect Wi-Fi
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  Serial.println("");

  // Setup pin
  pinMode(ON_Board_LED,OUTPUT);
  digitalWrite(ON_Board_LED, HIGH);
  pinMode(LED_D0,OUTPUT);
  digitalWrite(LED_D0, LOW);
  pinMode(LED_D3,OUTPUT);
  digitalWrite(LED_D3, LOW);
  pinMode(LED_D4,OUTPUT);
  digitalWrite(LED_D4, LOW);

  Serial.print("Connecting");

  // Connect Wi-Fi
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    digitalWrite(ON_Board_LED, LOW);
    delay(250);
    digitalWrite(ON_Board_LED, HIGH);
    delay(250);
  }
  
  digitalWrite(ON_Board_LED, HIGH);

  Serial.println("");
  Serial.print("Successfully connected to : ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.println();

  delay(2000);
}

void loop() {
  // Get data form DB
  int id = 1;
  getData = "ID=" + String(id);
  Destination = "NodeMCU/data/GetTest.php?ID=1";
  URL_Server = host_or_IPv4 + Destination;

  // Report conection & get data form DB
  Serial.println("----------------Connect to Server-----------------");
  Serial.println("Get LED Status from Server or Database");
  Serial.print("Request Link : ");
  Serial.println(URL_Server);
  http.begin(client, URL_Server);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  int httpCodeGet = http.POST(getData);
  payloadGet = http.getString();
  Serial.print("Response Code : ");
  Serial.println(httpCodeGet);
  Serial.print("Returned data from Server : ");
  Serial.println(payloadGet);
  JSONVar myObject = JSON.parse(payloadGet);
  Serial.println(myObject);
  JSONVar keys = myObject.keys();

  for (int i = 0; i < keys.length(); i++) {
    String value = myObject[keys[i]];
    Serial.print(keys[i]);
    Serial.print(" = ");
    Serial.println(value);
    sensorReadingsArr[i] = value;
  }

  // check & work status form DB
  if (sensorReadingsArr[0] == "1") {
    digitalWrite(LED_D0, HIGH);
  } else if (sensorReadingsArr[0] == "0") {
    digitalWrite(LED_D0, LOW);
  }
  if (sensorReadingsArr[4] == "1") {
    digitalWrite(LED_D4, HIGH);
  } else if (sensorReadingsArr[4] == "0") {
    digitalWrite(LED_D4, LOW);
  }
  if (sensorReadingsArr[3] == "1") {
    digitalWrite(LED_D3, HIGH);
  } else if (sensorReadingsArr[3] == "0") {
    digitalWrite(LED_D3, LOW);
  }
  //----------------------------------------

  delay(5000);

  // Post data to DB
  Serial.println();
  Serial.println("Sending LED Status to Server");
  humidityData = dht.readHumidity();
  temperatureData = dht.readTemperature();
  Serial.println(humidityData);
  Destination = "NodeMCU/data/status1.php";
  URL_Server = host_or_IPv4 + Destination;
  postData = "temp=" + String(temperatureData) + "&hum=" + String(humidityData);
  Serial.println(postData);
  Serial.print("Request Link : ");
  Serial.println(URL_Server);
  http.begin(client, URL_Server);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  int httpCodeSend = http.POST(postData);
  payloadSend = http.getString();
  Serial.print("Response Code : ");
  Serial.println(httpCodeSend);
  Serial.print("Returned data from Server : ");
  Serial.println(payloadSend);

  //----------------------------------------

  // Close section connect
  Serial.println("----------------Closing Connection----------------");
  http.end();
  Serial.println();
  Serial.println("Please wait 10 seconds for the next connection.");
  Serial.println();
  delay(10000);
}