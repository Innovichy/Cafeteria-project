#include <WiFi.h>
#include <HTTPClient.h>
#include <ArduinoJson.h>

const char* ssid = "";
const char* password = "";

struct Button {
  const uint8_t PIN;
  uint32_t currentIndex;
  bool buttonPressed;
};

Button button1 = {15, -1, false};
Button button2 = {32, -1, false};
Button button3 = {14, -1, false};

unsigned long button_time = 0;  
unsigned long last_button_time = 0;

// Food order string array
const int maxOrders = 50;
String orders[maxOrders];
String rando[maxOrders];

#include <SPI.h>
#include <MFRC522.h>
#define SS_PIN 5
#define RST_PIN 27
String UID;
MFRC522 mfrc522(SS_PIN, RST_PIN); // Create MFRC522 instance

#include <string>
#include <string.h>
int order=-1;
String Address = "192.168.43.7";
#include <HardwareSerial.h>
String hide;
char ficha = '*';
HardwareSerial mySerial(2);
int buzzer = 2;
int sizeb;
#include <Keypad.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
const int ROW_NUM = 4;
const int COLUMN_NUM = 4;
int down=1;
int locklogin = 1;
int number1[50];
int balance ;
String balance1 ;
int keyy;
String  firstName ;
String phoneNumber ;
String Security = "3636";
String Adpass = "2525";
double balanceRemain;
String password1;
int foodId1, foodId2, foodId3;
String foodname1, foodname2, foodname3;
int amount1, amount2, amount3;
int mealId[50];
String meal[50];
int mealamount[50];
int IdSelection ;
int paul=0;
String pesa;

char keys[ROW_NUM][COLUMN_NUM] = {
  {'1', '2', '3', 'A'},
  {'4', '5', '6', 'B'},
  {'7', '8', '9', 'C'},
  {'*', '0', '#', 'D'}
};

byte pin_rows[ROW_NUM] = {1, 3, 4, 25};
byte pin_column[COLUMN_NUM] = {26, 0, 13, 12};


Keypad keypad = Keypad( makeKeymap(keys), pin_rows, pin_column, ROW_NUM, COLUMN_NUM );

LiquidCrystal_I2C lcd(0x27, 20, 4);
LiquidCrystal_I2C lcd1(0x26, 16, 2);


char getRandomAlphabet() {
char randomChar = 'a' + random(26); // Generate a random number from 0 to 25 and add it to the ASCII value of 'a'
return randomChar;
}

void updatef()
{

     if (button1.buttonPressed) {
       if(button1.currentIndex != order  )
       {
    button1.currentIndex = (button1.currentIndex + 1) % maxOrders;
   
     paul= button1.currentIndex + 1 ;
    lcd1.clear();
    lcd1.setCursor(0, 0);
    lcd1.print(orders[button1.currentIndex]);
    lcd1.setCursor(0, 1);
    lcd1.print("Order:");
     lcd1.print(rando[button1.currentIndex]);
     lcd1.print(":"); 
    lcd1.print(paul);
    lcd1.print(" ");
    lcd1.print("/");
     lcd1.setCursor(14,1);
    lcd1.print(order+1);
   
    button1.buttonPressed = false;
     }
     else
      
     {
      lcd1.clear();
    lcd1.setCursor(0, 0);
    lcd1.print(orders[button1.currentIndex]);
    lcd1.setCursor(0, 1);
       lcd1.print("Order:");
     lcd1.print(rando[button1.currentIndex]);
     lcd1.print(":"); 
    lcd1.print(paul);
    lcd1.print(" ");
    lcd1.print("/");
     lcd1.setCursor(14,1);
    lcd1.print(order+1);
       button1.buttonPressed = false;
     }
   }


     if (button2.buttonPressed) {
       if(paul > 0 )
       {
        if(button1.currentIndex == 0)
        {
          lcd1.clear();
    lcd1.setCursor(0, 0);
    lcd1.print(orders[button1.currentIndex]);
    lcd1.setCursor(0, 1);
       lcd1.print("Order:");
     lcd1.print(rando[button1.currentIndex]);
     lcd1.print(":"); 
    lcd1.print(paul);
    lcd1.print(" ");
    lcd1.print("/");
     lcd1.setCursor(14,1);
    lcd1.print(order+1);
   
    button2.buttonPressed = false;
        }
        else
        {
    button1.currentIndex = (button1.currentIndex - 1) % maxOrders;
     paul= button1.currentIndex + 1;
    lcd1.clear();
    lcd1.setCursor(0, 0);
    lcd1.print(orders[button1.currentIndex]);
    lcd1.setCursor(0, 1);
        lcd1.print("Order:");
     lcd1.print(rando[button1.currentIndex]);
     lcd1.print(":"); 
    lcd1.print(paul);
    lcd1.print(" ");
    lcd1.print("/");
     lcd1.setCursor(14,1);
    lcd1.print(order+1);
   
    button2.buttonPressed = false;
     }
    }
     else 
       { 
         if(button1.currentIndex == -1)
         {
            lcd1.clear();
    lcd1.setCursor(0, 0);
     lcd1.print("Press Next");
          lcd1.setCursor(0, 1);
    lcd1.print("Order Total : ");
    lcd1.setCursor(14,1);
    lcd1.print(order+1);
        button2.buttonPressed = false;

         } 
         else 
         {
         lcd1.clear();
    lcd1.setCursor(0, 0);
    lcd1.print(orders[button1.currentIndex]);
    lcd1.setCursor(0, 1);
        lcd1.print("Order:");
     lcd1.print(rando[button1.currentIndex]);
     lcd1.print(":"); 
    lcd1.print(paul);
    lcd1.print(" ");
    lcd1.print("/");
     lcd1.setCursor(14,1);
    lcd1.print(order+1);
   
    button2.buttonPressed = false;
       }
     
   }
     }

     if (button3.buttonPressed) {
       if(paul > 0 )
       {
   
     paul= button1.currentIndex + 1;
    lcd1.clear();
    lcd1.setCursor(0, 0);
    if(!orders[button1.currentIndex].endsWith(")"))
    {
       orders[button1.currentIndex] = orders[button1.currentIndex] + " (sv)";
               String randomComb =rando[button1.currentIndex];
      
               HTTPClient http;
          http.begin("http://" + Address + "/cafeteria/tikectStatus.php?randomComb=" + String(randomComb));
          int httpCode = http.GET();
          if (httpCode == HTTP_CODE_OK) {
            String response = http.getString();
            Serial.println(response);
           
          }
          else {
            Serial.printf("HTTP GET request failed, error: %s\n", http.errorToString(httpCode).c_str());
            lcd.clear();
            lcd.print("error6");
            delay(3000);
            lcd.clear();
          }
          http.end();
          delay(500); // Add a small delay after receiving the response
          // Continue with the rest of your code or add a loop if necessary
       
    }
   
    lcd1.print(orders[button1.currentIndex]);
    lcd1.setCursor(0, 1);
        lcd1.print("Order:");
     lcd1.print(rando[button1.currentIndex]);
     lcd1.print(":"); 
    lcd1.print(paul);
    lcd1.print(" ");
    lcd1.print("/");
     lcd1.setCursor(14,1);
    lcd1.print(order+1);

    
for (int i = button1.currentIndex; i < order ; i++) {
  orders[i] = orders[i + 1]; // Shift elements to the left
  rando[i] = rando[i + 1];
}
orders[order] = ""; // Clear the last
rando[order] = "";
    order -- ;
if(order ==-1)
{
  paul =0;
 button1.currentIndex =-1;
 
}

          
    button3.buttonPressed = false;
     }
     else
      
     {
      lcd1.clear();
    lcd1.setCursor(0, 0);
     lcd1.print("End of Order ");
       button3.buttonPressed = false;
     }
   }
   
}

void IRAM_ATTR buttonInterrupt() {
     button_time = millis();
if (button_time - last_button_time >250)
{
    button1.buttonPressed = true;
      last_button_time = button_time;
         
}   
}
void IRAM_ATTR buttonInterrupt2() {
     button_time = millis();
if (button_time - last_button_time >250)
{
    button2.buttonPressed = true;
      last_button_time = button_time;
         
}   
}

void IRAM_ATTR buttonInterrupt3() {
     button_time = millis();
if (button_time - last_button_time >250)
{
    button3.buttonPressed = true;
      last_button_time = button_time;
         
}   
}
void setup() {
  pinMode(buzzer, OUTPUT);
  Serial.begin(115200);
  mySerial.begin(115200);
  SPI.begin(); // Initialize SPI bus
  mfrc522.PCD_Init(); // Initialize MFRC522 RFID module
  lcd.init();
  lcd.backlight();
  lcd1.init();
  lcd1.backlight();
     randomSeed(analogRead(0));
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");
  
               pinMode(button1.PIN, INPUT_PULLUP);
               pinMode(button2.PIN, INPUT_PULLUP);
               pinMode(button3.PIN, INPUT_PULLUP);
  attachInterrupt(button1.PIN, buttonInterrupt, FALLING);
  attachInterrupt(button2.PIN, buttonInterrupt2, FALLING);
   attachInterrupt(button3.PIN, buttonInterrupt3, FALLING);
           lcd.setCursor(0,0);
      lcd.print("     Welcome To");
     lcd.setCursor(0,1);
      lcd.print(" Cafeteria Smartcard");
     lcd.setCursor(0,2);
      lcd.print("    Billing System "); 
    
             delay(3000);
  lcd.clear();
}
void menu();
void salio()
{
  
    while (locklogin == 2)
  {     
       updatef();
    lcd.setCursor(0, 0);
    lcd.print("  Scan Your Card ");
    char key = keypad.getKey();
    if (key) {
      if (key == 'B')
      {
        
        lcd.clear();
        locklogin = 1;
        menu();

      }
    }
    if (mfrc522.PICC_IsNewCardPresent() && mfrc522.PICC_ReadCardSerial()) {
      // Print the tag UID in decimal format

      Serial.print("Tag UID: ");
      for (byte i = 0; i < mfrc522.uid.size; i++) {
        Serial.print(mfrc522.uid.uidByte[i]);
        UID += mfrc522.uid.uidByte[i];
        if (i < mfrc522.uid.size - 1) {
          //Serial.print(".");
        }
      }

      locklogin = 3;
      Serial.println();
      Serial.print(" ID ");
      Serial.print(UID);
      Serial.println();
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("Ucard: ");
      lcd.print(UID);
      lcd.setCursor(0, 1);
      lcd.print("Password: ");

      hide = "";
      while (locklogin == 3)
      {    
            updatef();
        char key = keypad.getKey();
        if (key) {

          Serial.println(key);

          if (key >= '0' && key <= '9') {
            if (password1.length() <= 4)
            {
              hide += ficha;
              password1 += key;
              lcd.setCursor(0, 1);
              lcd.print("Password: ");
              //lcd.print(password1);
              lcd.print(hide);
              Serial.print(password1);

            }
          }

          if (key == 'C')
          {
            if (password1.length() > 0)
            {
              hide.remove(hide.length() - 1 );
              password1.remove(password1.length() - 1);
              lcd.clear();
              lcd.setCursor(0, 0);
              lcd.print("Ucard: ");
              lcd.print(UID);
              lcd.setCursor(0, 1);
              lcd.print("Password: ");
              //lcd.print(password1);
              lcd.print(hide);

            }
          }
          if (key == 'A')
          {

            lcd.clear();
            locklogin = 4;
            

          }
          if (key == 'B')
          {

            lcd.clear();
            locklogin = 1;
            UID="";
            password1="";
            menu();

          }
            if (key == 'D')
          {
              lcd.setCursor(0, 1);
              lcd.print("Password: ");
               lcd.print(password1);
               delay(500);
                lcd.setCursor(0, 1);
              lcd.print("Password: ");
              lcd.print(hide);

          }
        }
      }
    }
  }

if (locklogin==4)
  {
        HTTPClient http;
  http.begin("http://" + Address + "/cafeteria/login.php?cardNumber=" + UID + "&password=" + password1);
  int httpCode = http.GET();
  if (httpCode > 0) {
    String response = http.getString();
    String stri = response;
    String check = "Successful";
    if (check == stri)
    {
      lcd.setCursor(0, 0);
      lcd.print(stri);
      delay(2000);
      lcd.clear();
      locklogin = 5;
      
    }
    else
    {
      lcd.setCursor(0, 0);
      //lcd.print("Incorrect Password");
      lcd.setCursor(0, 1);
      lcd.print(stri);
      //lcd.print(" Or RFID Card");
      delay(2000);
      lcd.clear();
      UID = "";
      password1 = "";
      locklogin = 1;
      menu();
    }


  }
  else {
    Serial.printf("HTTP POST request failed, error");
  }

  http.end();

  }

if(locklogin==5)
{
    int customer=1;
    while(customer==1)
    {
       updatef();
    lcd.setCursor(0,0);
    lcd.print(" 1 . Check Balance ");
    lcd.setCursor(0,1);
    lcd.print(" 2 . Change Password ");
    lcd.setCursor(0,2);
    lcd.print(" B . Back ");
        char key = keypad.getKey();
        if (key) {
     if(key=='1')
     {
      lcd.clear();
      customer=2;
     }
      if(key=='2')
     {
      lcd.clear();
      customer=3;
     }
      if(key=='B')
     {
        lcd.clear();
        UID = "";
        password1 = "";
        customer=8;
        locklogin = 1;
        menu();
     }
     
     }
    }
     
 if(customer==2)
 {   
String requestBody = "cardNumber=" + UID;

  // Send the HTTP POST request

  HTTPClient http;

  // Replace "your-server.com" with your actual server address
  http.begin("http://" + Address + "/cafeteria/balance.php");
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");

  int httpResponseCode = http.POST(requestBody);
  if (httpResponseCode > 0) {
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
    String response = http.getString();
    Serial.print("Response: ");
    Serial.println(response);



    // Extract the fields from the JSON


    int balanceStartIndex = response.indexOf("balance: ") + 9;
    int balanceEndIndex = response.indexOf("\n", balanceStartIndex);
    balance1 = response.substring(balanceStartIndex, balanceEndIndex);
    balance = balance1.toInt();

    int phoneNumberStartIndex = response.indexOf("phoneNumber: ") + 13;
    int phoneNumberEndIndex = response.indexOf("\n", phoneNumberStartIndex);
    phoneNumber = response.substring(phoneNumberStartIndex, phoneNumberEndIndex);

    int firstNameStartIndex = response.indexOf("firstName: ") + 11;
    int firstNameEndIndex = response.indexOf("\n", firstNameStartIndex);
    firstName = response.substring(firstNameStartIndex, firstNameEndIndex);

  }
  else {
    Serial.print("Error sending HTTP request. Error code: ");
    Serial.println(httpResponseCode);
  }

  http.end();

    lcd.setCursor(0, 0);
    lcd.print("Name : ");
    lcd.print(firstName);
    lcd.setCursor(0, 1);
    lcd.print("Your Balance:");
    lcd.print(balance);

      delay(10000);
        lcd.clear();
        UID = "";
        password1 = "";
        locklogin = 1;
        menu();
  }

   if(customer==3)
 {                      hide="";
                       password1="";
                     lcd.setCursor(0,0);
              lcd.print("Enter New Password ");
       while(customer==3)
       {   
              updatef();
         char key = keypad.getKey();
        if (key) {

          Serial.println(key);

          if (key >= '0' && key <= '9') {
            if (password1.length() <= 4)
            {
              hide += ficha;
              password1 += key;
              lcd.setCursor(0, 1);
              lcd.print("Password: ");
              //lcd.print(password1);
              lcd.print(hide);
              Serial.print(password1);

            }
          }

          if (key == 'C')
          {
            if (password1.length() > 0)
            {
              hide.remove(hide.length() - 1 );
              password1.remove(password1.length() - 1);
              lcd.clear();
              lcd.setCursor(0, 0);
              lcd.print("Ucard: ");
              lcd.print(UID);
              lcd.setCursor(0, 1);
              lcd.print("Password: ");
              //lcd.print(password1);
              lcd.print(hide);

            }
          }
          if (key == 'A')
          {

            lcd.clear();
            customer = 4;
              HTTPClient http;
  http.begin("http://" + Address + "/cafeteria/changepassword.php?cardNumber=" + UID + "&password=" + password1);
  int httpCode = http.GET();
  if (httpCode > 0) {
    String response = http.getString();
    String stri = response;
    String check = "Successful";
    if (check == stri)
    {
      lcd.setCursor(0, 0);
      lcd.print(stri);
      delay(2000);
      lcd.clear();
         UID="";
         password1="";
      locklogin = 1;
        menu(); 
      
    }
    else
    {
      lcd.setCursor(0, 0);
      //lcd.print("Incorrect Password");
      lcd.setCursor(0, 1);
      lcd.print(stri);
      //lcd.print(" Or RFID Card");
      delay(2000);
      lcd.clear();
      UID = "";
      password1 = "";
      locklogin = 1;
      menu();
    }


  }
  else {
    Serial.printf("HTTP POST request failed, error");
  }

     http.end();


          }
          if (key == 'B')
          {

            lcd.clear();
            locklogin = 1;
            UID="";
            password1="";
            menu();

          }
            if (key == 'D')
          {
              lcd.setCursor(0, 1);
              lcd.print("Password: ");
               lcd.print(password1);
               delay(500);
                lcd.setCursor(0, 1);
              lcd.print("Password: ");
              lcd.print(hide);

          }
        }
   
  
    }
   }
  }
}

void registercard()
{


  while (locklogin == 15)
  {
     updatef();
    lcd.setCursor(0, 0);
    lcd.print("  Scan Your Card ");
    char key = keypad.getKey();
    if (key) {
      if (key == 'B')
      {

        lcd.clear();
        locklogin = 1;
        menu();

      }
    }
    if (mfrc522.PICC_IsNewCardPresent() && mfrc522.PICC_ReadCardSerial()) {
      // Print the tag UID in decimal format

      Serial.print("Tag UID: ");
      for (byte i = 0; i < mfrc522.uid.size; i++) {
        Serial.print(mfrc522.uid.uidByte[i]);
        UID += mfrc522.uid.uidByte[i];
        if (i < mfrc522.uid.size - 1) {
          //Serial.print(".");
        }
      }

      Serial.println();
      Serial.print(" ID ");
      Serial.print(UID);
      Serial.println();
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("Ucard: ");
      lcd.print(UID);
      lcd.setCursor(0, 1);
      lcd.print("Password: ");

      hide = "";
      while (locklogin == 15)
      {
         updatef();
        char key = keypad.getKey();
        if (key) {

          Serial.println(key);

          if (key >= '0' && key <= '9') {
            if (password1.length() <= 4)
            {
              hide += ficha;
              password1 += key;
              lcd.setCursor(0, 1);
              lcd.print("Password: ");
              //lcd.print(password1);
              lcd.print(hide);
              Serial.print(password1);

            }
          }

          if (key == 'C')
          {
            if (password1.length() > 0)
            {
              hide.remove(hide.length() - 1 );
              password1.remove(password1.length() - 1);
              lcd.clear();
              lcd.setCursor(0, 0);
              lcd.print("Ucard: ");
              lcd.print(UID);
              lcd.setCursor(0, 1);
              lcd.print("Password: ");
              //lcd.print(password1);
              lcd.print(hide);

            }
          }
          if (key == 'A')
          {

            lcd.clear();


            HTTPClient http;
            http.begin("http://" + Address + "/cafeteria/scannedDetails.php?ScanedCardnumber=" + UID + "&userpassword=" + password1);
            int httpCode = http.GET();
            if (httpCode > 0) {
              String response = http.getString();
              String stri = response;
              String check = "Successful";
              if (check == stri)
              {
                lcd.setCursor(0, 0);
                lcd.print(stri);
                delay(2000);
                lcd.clear();
                UID = "";
                password1 = "";
                locklogin = 7;
                admin();
              }
              else
              {
                lcd.setCursor(0, 0);
                lcd.print("Incorrect ");
                lcd.setCursor(0, 1);
                lcd.print(stri);
                //lcd.print(" Or RFID Card");
                delay(2000);
                lcd.clear();
                UID = "";
                password1 = "";
                locklogin = 7;
                admin();
              }


            }
            else {
              Serial.printf("HTTP POST request failed, error");
              lcd.setCursor(0, 0);
              lcd.print("Error 1");
              delay(1000);
              lcd.clear();
              admin();
            }

            http.end();

          }
          if (key == 'B')
          {

            lcd.clear();
            lcd.setCursor(0, 0);
            lcd.print("Ucard: ");
            lcd.print(UID);
            lcd.setCursor(0, 1);
            lcd.print("Password: ");
            lcd.print(password1);
            delay(2000);
          }
        }
      }
    }
  }

}
void malipo()
{


  String requestBody = "cardNumber=" + UID;
  HTTPClient http;
  http.begin("http://" + Address + "/cafeteria/balance.php");
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");

  int httpResponseCode = http.POST(requestBody);
  if (httpResponseCode > 0) {
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
    String response = http.getString();
    Serial.print("Response: ");
    Serial.println(response);

    int balanceStartIndex = response.indexOf("balance: ") + 9;
    int balanceEndIndex = response.indexOf("\n", balanceStartIndex);
    balance1 = response.substring(balanceStartIndex, balanceEndIndex);
    balance = balance1.toInt();

    int phoneNumberStartIndex = response.indexOf("phoneNumber: ") + 13;
    int phoneNumberEndIndex = response.indexOf("\n", phoneNumberStartIndex);
    phoneNumber = response.substring(phoneNumberStartIndex, phoneNumberEndIndex);

    int firstNameStartIndex = response.indexOf("firstName: ") + 11;
    int firstNameEndIndex = response.indexOf("\n", firstNameStartIndex);
    firstName = response.substring(firstNameStartIndex, firstNameEndIndex);

  }
  else {
    Serial.print("Error sending HTTP request. Error code: ");
    Serial.println(httpResponseCode);
  }

  http.end();

  http.begin("http://" + Address + "/cafeteria/thepayment.php?cardnumber=" + UID + "&payment=" + String(pesa));

  int httpCode = http.GET();
  if (httpCode > 0) {
    String response = http.getString();
    lcd.clear();
    //lcd.print(response);
    delay(3000);
    lcd.clear();
    if (response == "successfully")
    {
      lcd.clear();
      lcd.setCursor(0, 0);
      // lcd.print(response);
      lcd.print("Money is Deposited");
      lcd.setCursor(0, 1);
      lcd.print("To customer Acc.");
      lcd.setCursor(0,2);
      lcd.print("Acc : ");
      lcd.print(UID);
      lcd.setCursor(0, 3);
      lcd.print("Customer:");
      lcd.print(firstName);
      delay(5000);
      lcd.clear();
      mySerial.println("AT+CMGF=1");
      delay(100);
      mySerial.println("AT+CMGS=\"" + phoneNumber + "\"");
      delay(100);
      mySerial.println("Ndugu " + firstName + ",kiasi cha Tsh " + pesa + " kimewekwa kwenye account yako,card no " + UID + ".");
      delay(100);
      mySerial.println("CENTER PLAZA CAFETERIA.");
       delay(100);
      mySerial.println((char)26);
      delay(2000);
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("SMS sent to customer");
      delay(2000);
      lcd.clear();
      UID = " ";
      pesa = " ";
      locklogin = 7;
       updatef();
      admin();
    }
    else
    {
      lcd.clear();
      lcd.print(response);
      lcd.print("Error1");
      delay(1000);
      UID = " ";
      pesa = " ";
      locklogin = 7;
      lcd.clear();
      admin();
    }
  } else {
    Serial.println("Failed to update balance. Errorcode: " + String(httpCode));
    lcd.clear();

    // lcd.print("Error2");
    delay(1000);
    UID = " ";
    pesa = " ";
    locklogin = 1;
    lcd.clear();
    loop();
  }

  http.end();
  delay(100); // Wait for 5 seconds beforesending the next request
     lcd.clear();


}

void  useramount()
{

  while (locklogin == 8)
  {
        updatef();
    lcd.setCursor(0, 0);
    lcd.print("Scan Customer Card ");
         char key = keypad.getKey();

        if (key) {
           if (key == 'B')
          { 
             pesa="";
             UID="";
             lcd.clear();
             locklogin=7;
             admin();   
          }
        }
    
    if (mfrc522.PICC_IsNewCardPresent() && mfrc522.PICC_ReadCardSerial()) {
      // Print the tag UID in decimal format
      Serial.print("Tag UID: ");
      for (byte i = 0; i < mfrc522.uid.size; i++) {
        Serial.print(mfrc522.uid.uidByte[i]);
        UID += mfrc522.uid.uidByte[i];
        if (i < mfrc522.uid.size - 1) {
          //Serial.print(".");
        }
      }
      lcd.clear();

      lcd.setCursor(0, 0);
      lcd.print("Card :");
      lcd.print(UID);
      lcd.setCursor(0, 1);
      lcd.print("Enter amount ");
      while (locklogin == 8)
      {    
           updatef();
        char key = keypad.getKey();

        if (key) {

          if (key >= '0' && key <= '9') {

            pesa += key;
            lcd.setCursor(0, 2);
            lcd.print("Amount: ");
            lcd.print(pesa);

          }


          if (key == 'C')
          {
            if (pesa.length() > 0)
            {
              pesa.remove(pesa.length() - 1);
              lcd.clear();
              lcd.print("Card :");
               lcd.print(UID);
                lcd.setCursor(0, 1);
                lcd.print("Enter amount ");
              lcd.setCursor(0, 2);
              lcd.print("Amount: ");
              lcd.print(pesa);
            }
          }
          if (key == 'A')
          {
                lcd.clear();
            
              int fedha=pesa.toInt();
            if (fedha>=1000)
            { 
              
              locklogin = 10;
              malipo(); 
            }
            else 
            {
              lcd.setCursor(0,0);
              lcd.print("Enter Amount Greater");
              lcd.setCursor(0,1);
              lcd.print("Than 1,000 Tsh");
              delay(3000);
              lcd.clear();
              pesa="";
              UID="";
              useramount();
            }
            
          }
           if (key == 'B')
          { 
             pesa="";
             UID="";
             lcd.clear();
             locklogin=7;
             admin();
          }

        }
      }
    }
  }
}
void newcard()
{
  while (locklogin == 9)
  {     
          updatef();
        char key = keypad.getKey();

        if (key) {
           if (key == 'B')
          { 
             pesa="";
             UID="";
             lcd.clear();
             locklogin=7;
             admin();   
          }
        }
         
    lcd.setCursor(0, 1);
    lcd.print("    Scan New card ");
    lcd.setCursor(0, 2);
    lcd.print("     To Add ");

    if (mfrc522.PICC_IsNewCardPresent() && mfrc522.PICC_ReadCardSerial()) {
      // Print the tag UID in decimal format

      Serial.print("Tag UID: ");
      for (byte i = 0; i < mfrc522.uid.size; i++) {
        Serial.print(mfrc522.uid.uidByte[i]);
        UID += mfrc522.uid.uidByte[i];
        if (i < mfrc522.uid.size - 1) {
          //Serial.print(".");
        }
      }
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("New Card :");
      lcd.print(UID);
      delay(2000);
      lcd.clear();

      // Make a POST request to the PHP script
      HTTPClient http;
      http.begin("http://" + Address + "/cafeteria/registercard.php?number=" + UID);
      int httpCode = http.GET();
      if (httpCode > 0) {
        String response = http.getString();
        Serial.println(response);
        lcd.setCursor(0, 1);
        lcd.print(response);
        delay(2000);

      } else {
        Serial.println("Error on HTTP request");
      }

      http.end();

      UID = "";
      lcd.clear();
      locklogin = 7;
      admin();


    }
  }
}

void admin()
{

  while (locklogin == 7)
  {   
        updatef();
    lcd.setCursor(0, 0);
    lcd.print(" 1 . Add amount " );
    lcd.setCursor(0, 1);
    lcd.print(" 2 . Add New Card  " );
    lcd.setCursor(0, 2);
    lcd.print(" 3 . Regstr Customer" );
    lcd.setCursor(0, 3);
    lcd.print(" # . Exit  " );
    char key = keypad.getKey();
    if (key) {
      if (key == '1')
      {
        lcd.clear();
        locklogin = 8;
        useramount();
      }
      if (key == '2')
      {
        lcd.clear();
        locklogin = 9;
        newcard();
      }
      if (key == '3')
      {
        lcd.clear();
        locklogin = 15;
        registercard();
      }
      if (key == '#')
      {
        lcd.clear();
        locklogin = 1;
        menu();
      }
      if (key == 'B')
      {

        lcd.clear();
        locklogin = 1;
        menu();

      }
    }



  }
}
void confirm()
{

  String requestBody = "cardNumber=" + UID;

  // Send the HTTP POST request

  HTTPClient http;

  // Replace "your-server.com" with your actual server address
  http.begin("http://" + Address + "/cafeteria/balance.php");
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");

  int httpResponseCode = http.POST(requestBody);
  if (httpResponseCode > 0) {
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
    String response = http.getString();
    Serial.print("Response: ");
    Serial.println(response);



    // Extract the fields from the JSON


    int balanceStartIndex = response.indexOf("balance: ") + 9;
    int balanceEndIndex = response.indexOf("\n", balanceStartIndex);
    balance1 = response.substring(balanceStartIndex, balanceEndIndex);
    balance = balance1.toInt();

    int phoneNumberStartIndex = response.indexOf("phoneNumber: ") + 13;
    int phoneNumberEndIndex = response.indexOf("\n", phoneNumberStartIndex);
    phoneNumber = response.substring(phoneNumberStartIndex, phoneNumberEndIndex);

    int firstNameStartIndex = response.indexOf("firstName: ") + 11;
    int firstNameEndIndex = response.indexOf("\n", firstNameStartIndex);
    firstName = response.substring(firstNameStartIndex, firstNameEndIndex);

  }
  else {
    Serial.print("Error sending HTTP request. Error code: ");
    Serial.println(httpResponseCode);
  }

  http.end();



  //
  //  String balance;
  //  balance = "20000";
  //  foodname1 = "Wali nyama";
  //  amount1 = 2000;
  int cut = 0;
  String chakula;
  int bei;

  chakula=meal[keyy];
  bei=mealamount[keyy];
       if (balance < bei)
    {
      cut = 1;
    }
  

  while (locklogin == 5)
  {
       updatef();
    lcd.setCursor(0, 0);
    lcd.print("Your Balance: ");
    lcd.print(balance);
     lcd.setCursor(0,1);
     lcd.print(chakula);
     lcd.print(" ");
     lcd.print(bei);
    if (cut == 1)
    {
      lcd.setCursor(0, 2);
      lcd.print("Balance Not Enough");
      lcd.setCursor(0, 3);
      lcd.print("RechargeORChangeFood");
      delay(5000);
      lcd.clear();
      UID = "";
      password1 = "";
      locklogin = 1;
      menu();
    }
    else
    {
      lcd.setCursor(0, 2);
      lcd.print(" Scan Your card ");
      lcd.setCursor(0, 3);
      lcd.print("   To confirm ");

          char key = keypad.getKey();
        if (key) {
         if (key == 'B')
      { 
        locklogin = 1;
        UID="";
        password1="";
        lcd.clear();
        menu();
      }
        }
         
      String card ;

      if (mfrc522.PICC_IsNewCardPresent() && mfrc522.PICC_ReadCardSerial()) {
        // Print the tag UID in decimal format

        Serial.print("Tag UID: ");
        for (byte i = 0; i < mfrc522.uid.size; i++) {
          Serial.print(mfrc522.uid.uidByte[i]);

          card += mfrc522.uid.uidByte[i];
          if (i < mfrc522.uid.size - 1) {
            //Serial.print(".");
          }
        }


        if ( card == UID )
        {


              String randomCombination = "";
// Generate and append three random alphabetsto the String
for (int i = 0; i < 2; i++) {
char randomAlphabet = getRandomAlphabet();
randomCombination += randomAlphabet;
}
              order ++;
   randomCombination.toUpperCase();
  rando[order]=randomCombination;

                      HTTPClient http;
          http.begin("http://" + Address + "/cafeteria/sendfood.php?foodId=" + String(IdSelection) + "&cardNumber=" + String(UID) + "&randomCombination=" + String(randomCombination));


          int httpCode = http.GET();
          if (httpCode == HTTP_CODE_OK) {
            String response = http.getString();
            Serial.println(response);
            // Process the response if needed
  
            lcd.clear();
          }
          else {
            Serial.printf("HTTP GET request failed, error: %s\n", http.errorToString(httpCode).c_str());
            lcd.clear();
            lcd.print("error6");
            delay(5000);
            lcd.clear();
          }
          http.end();
          delay(500); // Add a small delay after receiving the response
          // Continue with the rest of your code or add a loop if necessary

          
          lcd.clear();
          lcd.setCursor(0, 0);
          lcd.print(" Take Your Food ");
           lcd.setCursor(0, 1);
          lcd.print("Food no: ");
           lcd.print(order + 1);
           lcd.setCursor(0, 2);
          lcd.print("Tkt no: ");
           lcd.print(rando[order]);
          delay(3000);
           lcd.clear();
          UID = "";
          password1 = "";
          locklogin = 1;
          
           orders[order]=chakula;
//          lcd1.clear();
//          lcd1.setCursor(0, 0);
//           lcd1.print(order);
//            lcd1.print("#");
//          lcd1.print( orders[order]);
//          lcd1.setCursor(0, 1);
//          lcd1.print(bei);
          digitalWrite(buzzer, HIGH);
          delay(500);
          digitalWrite(buzzer, LOW);
          lcd1.setCursor(14,1);
          lcd1.print(order+1);
          down=1;
           updatef();
          menu();

        }
        else
        {

        }

      }
    }
  }
}
void senddata()
{

  // Make a POST request to the PHP script

  HTTPClient http;
  http.begin("http://" + Address + "/cafeteria/login.php?cardNumber=" + UID + "&password=" + password1);
  int httpCode = http.GET();
  if (httpCode > 0) {
    String response = http.getString();
    String stri = response;
    String check = "Successful";
    if (check == stri)
    {
      lcd.setCursor(0, 0);
      lcd.print(stri);
      delay(2000);
      lcd.clear();
      locklogin = 5;
      confirm();
    }
    else
    {
      lcd.setCursor(0, 0);
      //lcd.print("Incorrect Password");
      lcd.setCursor(0, 1);
      lcd.print(stri);
      //lcd.print(" Or RFID Card");
      delay(2000);
      lcd.clear();
      UID = "";
      password1 = "";
      locklogin = 2;
      login();
    }


  }
  else {
    Serial.printf("HTTP POST request failed, error");
  }

  http.end();
 updatef();
}
void login()
{
  while (locklogin == 2)
  {
     updatef();
    lcd.setCursor(0, 0);
    lcd.print("  Scan Your Card ");
    char key = keypad.getKey();
    if (key) {
      if (key == 'B')
      {
        
        lcd.clear();
        locklogin = 1;
        menu();

      }
    }
    if (mfrc522.PICC_IsNewCardPresent() && mfrc522.PICC_ReadCardSerial()) {
      // Print the tag UID in decimal format

      Serial.print("Tag UID: ");
      for (byte i = 0; i < mfrc522.uid.size; i++) {
        Serial.print(mfrc522.uid.uidByte[i]);
        UID += mfrc522.uid.uidByte[i];
        if (i < mfrc522.uid.size - 1) {
          //Serial.print(".");
        }
      }

      locklogin = 3;
      Serial.println();
      Serial.print(" ID ");
      Serial.print(UID);
      Serial.println();
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("Ucard: ");
      lcd.print(UID);
      lcd.setCursor(0, 1);
      lcd.print("Password: ");

      hide = "";
      while (locklogin == 3)
      { 
        updatef();
        char key = keypad.getKey();
        if (key) {

          Serial.println(key);

          if (key >= '0' && key <= '9') {
            if (password1.length() <= 4)
            {
              hide += ficha;
              password1 += key;
              lcd.setCursor(0, 1);
              lcd.print("Password: ");
              //lcd.print(password1);
              lcd.print(hide);
              Serial.print(password1);

            }
          }

          if (key == 'C')
          {
            if (password1.length() > 0)
            {
              hide.remove(hide.length() - 1 );
              password1.remove(password1.length() - 1);
              lcd.clear();
              lcd.setCursor(0, 0);
              lcd.print("Ucard: ");
              lcd.print(UID);
              lcd.setCursor(0, 1);
              lcd.print("Password: ");
              //lcd.print(password1);
              lcd.print(hide);

            }
          }
          if (key == 'A')
          {

            lcd.clear();
            locklogin = 4;
            senddata();

          }
          if (key == 'B')
          {

            lcd.clear();
            locklogin = 2;
            UID="";
            password1="";
            login();

          }
            if (key == 'D')
          {
              lcd.setCursor(0, 1);
              lcd.print("Password: ");
               lcd.print(password1);
               delay(500);
                lcd.setCursor(0, 1);
              lcd.print("Password: ");
              lcd.print(hide);

          }
        }
      }
    }
  }
}

void menu()
{           
                updatef();
            int number = 1;
            int number2 =1;
  // Make an HTTP GET request to the PHP script
  HTTPClient http;
  String url = "http://" + Address + "/cafeteria/food.php";
  http.begin(url);

  int httpCode = http.GET();
  if (httpCode > 0) {
    if (httpCode == HTTP_CODE_OK) {
      String payload = http.getString();

      // Parse the JSON response
      DynamicJsonDocument json(1024);
      DeserializationError error = deserializeJson(json, payload);

      if (error) {
        Serial.printf("Failed to parse JSON, error: %s\n", error.c_str());
        
        return;
      }

      // Access the JSON data
      JsonArray data = json.as<JsonArray>();
      for (const JsonObject& food : data) {
        int foodId = food["Food ID"];
        String foodname = food["Food Name"];
        int amount = food["Amount"];

        lcd.setCursor(0, 0);
        lcd.print("     Food Menu ");
         lcd.setCursor(15, 0);
          lcd.print("(");
        lcd.print(data.size());
          lcd.print(")");   
           //lcd.print(button1.buttonPressed);      
      
                 sizeb=data.size();
           Serial.println(number1[number]);
           if(number<=data.size())
           {
            if (number<=3  && down==1 )
                 {
                  
          lcd.setCursor(0,number);
          lcd.print(number);
          lcd.print("");
          lcd.print(foodname);
          lcd.setCursor(14,number);
          lcd.print(":");
          lcd.print(amount);
                 }
                 if(number>=4 && number <=6 && down==2)
                 {
                  
          lcd.setCursor(0,number2);
          lcd.print(number);
          lcd.print("");
          lcd.print(foodname);
          lcd.setCursor(14,number2);
          lcd.print(":");
          lcd.print(amount);
          
              number2 ++ ;        
                 }
             mealId[number]=foodId;
             meal[number]=foodname;
             mealamount[number]=amount;
        number ++;
           }
      }
    }
  } else {
    Serial.printf("HTTP GET request failed, error: %s\n", http.errorToString(httpCode).c_str());
    
    
  }

  http.end();


  char key = keypad.getKey();
  if (key) {
    Serial.println(key);

    if (key >= '0' && key <= '9') {

      if (key == '1')
      {
          keyy=1;
             if(mealId[keyy] !=0 )
        {
        lcd.clear();
        IdSelection = mealId[keyy];  
        locklogin = 2;
        login();
        }
      }
      if (key == '2')
      {
          keyy=2;
             if(mealId[keyy] !=0 )
        {
        lcd.clear();
        IdSelection = mealId[keyy];  
        locklogin = 2;
        login();
        }

      }
      if (key == '3')
      {
           keyy=3;
             if(mealId[keyy] !=0 )
        {
        lcd.clear();
        IdSelection = mealId[keyy];  
        locklogin = 2;
        login();
        }
      }
            if (key == '4')
      {
          keyy=4;
             if(mealId[keyy] !=0 )
        {
        lcd.clear();
        IdSelection = mealId[keyy];  
        locklogin = 2;
        login();
        }
      }
      if (key == '5')
      {
          keyy=5;
             if(mealId[keyy] !=0 )
        {
        lcd.clear();
        IdSelection = mealId[keyy];  
        locklogin = 2;
        login();
        }
      }
      if (key == '6')
      {
           keyy=6;
        
                if(mealId[keyy] !=0 )
        {
        lcd.clear();
        IdSelection = mealId[keyy];  
        locklogin = 2;
        login();
        }
      }
    
    }
  if (key == '#')
      {
           
           lcd.clear();
          down = 2;
      }
       if (key == '*')
      {
            lcd.clear();
          down = 1;
      }

     if (key=='A')
     {
      lcd.clear();
      locklogin = 2;
      salio(); 
     }

    if (key == 'D')
    {
      hide = "";
      lcd.clear();
      IdSelection = key;
      int au = 1;
      String secu = "";
      String ad = "";
      lcd.clear();
      while (au == 1)
      {  
          updatef();
        lcd.setCursor(0, 0);
        lcd.print("SecurityKey: ");
        lcd.print(hide);
        char key = keypad.getKey();
        if (key) {

          Serial.println(key);

          if (key >= '0' && key <= '9') {
            if (secu.length() <= 4)
            {
              secu += key;
              hide += ficha;
              lcd.setCursor(0, 0);
              lcd.print("SecurityKey: ");
              //lcd.print(secu);
              lcd.print(hide);
              Serial.print(password1);

            }
          }

          if (key == 'C')
          {
            if (secu.length() > 0)
            {
              hide.remove(hide.length() - 1);
              secu.remove(secu.length() - 1);
              lcd.clear();
              lcd.setCursor(0, 0);
              lcd.print("SecurityKey: ");
              //lcd.print(secu);
              lcd.print(hide);

            }
          }
          if (key == 'A')
          {

            lcd.clear();
            au = 2;
            hide = "";

          }
          if (key == 'B')
          {

            lcd.clear();
            locklogin = 1;
            au=0;
            menu();

          }

          if (key == 'D')
          {
              lcd.setCursor(0, 0);
              lcd.print("SecurityKey: ");
               lcd.print(secu);
               delay(500);
                lcd.setCursor(0, 0);
              lcd.print("SecurityKey: ");
              lcd.print(hide);

          }

          
        }
      }

      while (au == 2)
      {
         updatef();
        lcd.setCursor(0, 0);
        lcd.print("Password: ");
        lcd.print(hide);
        char key = keypad.getKey();
        if (key) {

          Serial.println(key);

          if (key >= '0' && key <= '9') {
            if (ad.length() <= 4)
            {
              hide += ficha;
              ad += key;
              lcd.setCursor(0, 0);
              lcd.print("Password: ");
              // lcd.print(ad);
              lcd.print(hide);
              Serial.print(password1);

            }
          }

          if (key == 'C')
          {
            if (ad.length() > 0)
            {
              hide.remove(hide.length() - 1);
              ad.remove(ad.length() - 1);
              lcd.clear();
              lcd.setCursor(0, 0);
              lcd.print("Password: ");
              //lcd.print(ad);
              lcd.print(hide);

            }
          }
          if (key == 'A')
          {

            lcd.clear();
            au = 3;


          }
          if (key == 'B')
          {

            lcd.clear();
            locklogin = 1;
            au=0;
            menu();

          }


            if (key == 'D')
          {
              lcd.setCursor(0, 0);
              lcd.print("Password: ");
               lcd.print(ad);
               delay(500);
                lcd.setCursor(0, 0);
              lcd.print("Password: ");
              lcd.print(hide);

          }
          
        }
      }
      if (au == 3)
      {
        if (Security == secu && Adpass == ad)
        {
          lcd.clear();
          lcd.setCursor(0, 0);
          lcd.print(" Admin Session ");
          delay(1500);
          lcd.clear();
          locklogin = 7;
          admin();
        }
        else
        {
          lcd.clear();
          lcd.setCursor(0, 0);
          lcd.print(" Incorrect ");
          delay(2000);
          lcd.clear();
          locklogin = 1;
          menu();
        }

      }

    }

  }

       int ab=1;
 for(ab=1 ; ab<=6 ; ab ++)
  {
     mealId[ab]=0;
  }
  
}

void loop() {
  // Your code here
  if (locklogin == 1)
  {
    menu();
    
  }
}
