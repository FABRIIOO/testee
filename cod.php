<?php

 
  $estado = $_POST['led'];
  $conexaoarduino = fopen("COM4","w"); ///abrindo a porta serial para a comunicação 
  sleep(1);

  if($estado == "desligar"){
  	$acao = '0';
  }
  elseif($estado == "ligar"){
  	$acao = '1';
  }

fwrite($conexaoarduino,$acao);
fclose($conexaoarduino);	


int LD1 = 2;
int valor;
void setup() {
  
  pinMode(LD1, OUTPUT);
  Serial.begin(9600);
}

void loop() {
  if(Serial.available()>0){
    valor = Serial.read();
  }
  
  if(valor == '1'){
    digitalWrite(LD1,HIGH);
    delay(1000);
  }
  if(valor == '0'){
   digitalWrite(LD1,LOW);
    delay(1000);
    }
}


?>