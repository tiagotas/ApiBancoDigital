             PASSOS PARA USAR A API LOCALMENTE

1) Importe o Banco de Dados via MySQL Workbench
2) Abra a pasta do projeto no VS Code
3) Inicialize o servidor do PHP: php -S 0.0.0.0:8000
4) Sim, a inicialização é diferente, aqui estamos usando um Wild Card que possibilia o Servidor Interno do PHP a ser acessado a partir de outros hosts (o emaulador é um host a parte do computador hospedeiro)
5) Deixe o Terminal aberto para acompanhar o log de saída e ver requisições bem sucedidas (status code 200)

No App em Xamarin/Maui altere o local de conexão para:
6) Altere na data service para:
   http://10.0.2.2:8000/rota_desejada
   
4) Repositório do Aplicativo: https://github.com/tiagotas/AppBancoDigital

5) Confgure seu App Android para requisições inseguras
   (sem https) no arquivo AndroidManifest.xml:

   `<application  android:usesCleartextTraffic="true" ... />`
   
   EXEMPLO de como ficará com a alteração
   
`<?xml version="1.0" encoding="utf-8"?>
<manifest xmlns:android="http://schemas.android.com/apk/res/android" android:versionCode="1" android:versionName="1.0" package="com.companyname.appbancodigital">
    <uses-sdk android:minSdkVersion="21" android:targetSdkVersion="31" />
    <application android:usesCleartextTraffic="true" android:label="AppBancoDigital.Android" android:theme="@style/MainTheme"></application>
    <uses-permission android:name="android.permission.ACCESS_NETWORK_STATE" />
</manifest>`
