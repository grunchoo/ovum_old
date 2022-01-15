function scan(){
let scanner = new Instascan.Scanner(
    {
        video: document.getElementById('preview_qr'),
        mirror: false,
    }
);
scanner.addListener('scan', function(content) {
    
    window.open(content, "_top");
});
Instascan.Camera.getCameras().then(cameras => 
{
    if(cameras.length > 0){
        scanner.start(cameras[1]);
    } else {
        console.error("No existe camara en el dispositivo!");
    }
});
}