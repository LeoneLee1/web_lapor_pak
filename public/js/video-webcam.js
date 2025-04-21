// seleksi elemen video
var video = document.querySelector("#video-webcam");

// minta izin user
navigator.getUserMedia =
    navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia ||
    navigator.oGetUserMedia;

// jika user memberikan izin
if (navigator.getUserMedia) {
    // jalankan fungsi handleVideo, dan videoError jika izin ditolak
    navigator.getUserMedia(
        {
            video: true,
        },
        handleVideo,
        videoError
    );
}

// fungsi ini akan dieksekusi jika  izin telah diberikan
function handleVideo(stream) {
    video.srcObject = stream;
}

// fungsi ini akan dieksekusi kalau user menolak izin
function videoError(e) {
    // do something
    alert("Izinkan menggunakan webcam untuk demo!");
}

function takeSnapshot() {
    // buat elemen img
    var img = document.createElement("img");
    var context;

    // ambil ukuran video
    var width = video.offsetWidth,
        height = video.offsetHeight;

    // buat elemen canvas
    canvas = document.createElement("canvas");
    canvas.width = width;
    canvas.height = height;

    // ambil gambar dari video dan masukan
    // ke dalam canvas
    context = canvas.getContext("2d");
    context.drawImage(video, 0, 0, width, height);

    // render hasil dari canvas ke elemen img
    img.src = canvas.toDataURL("image/png");
    // document.body.appendChild(img);
    var resultDiv = document.getElementById("result");
    resultDiv.innerHTML = ""; // menghapus gambar lama (jika ada)
    resultDiv.appendChild(img);

    // Masukkan gambar ke dalam input file
    var inputFile = document.getElementById("bukti_laporan");

    // Membuat Blob dari Data URL
    var base64Data = img.src.split(",")[1]; // Ambil bagian data setelah koma
    var binary = atob(base64Data); // Decode base64 menjadi binary data
    var array = [];

    // Membuat binary array dari string hasil decode base64
    for (var i = 0; i < binary.length; i++) {
        array.push(binary.charCodeAt(i));
    }

    // Membuat Blob dari array binary
    var blob = new Blob([new Uint8Array(array)], {
        type: "image/png",
    });

    // Membuat file dari Blob
    var file = new File([blob], "snapshot.png", {
        type: "image/png",
    });

    // Create a new DataTransfer object
    var dataTransfer = new DataTransfer();
    dataTransfer.items.add(file);

    // Set the input file value with the new File object
    inputFile.files = dataTransfer.files;

    // Pastikan untuk mendapatkan stream webcam dan menampilkannya pada video
    navigator.mediaDevices
        .getUserMedia({
            video: true,
        })
        .then(function (stream) {
            var video = document.getElementById("video-webcam");
            video.srcObject = stream;
        })
        .catch(function (error) {
            console.log(
                "Terjadi kesalahan dalam mendapatkan video stream: ",
                error
            );
        });
}
