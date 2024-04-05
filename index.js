document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Menghentikan pengiriman formulir langsung
    
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var rememberMe = document.getElementById("myCheckbox").checked; // Periksa apakah kotak "Ingat Saya" dicentang
    
    if (!isValidEmail(email) || !isValidPassword(password)) {
        showDialog("Email atau password tidak valid");
    } else {
        // Data formulir yang akan dikirim
        var formData = new FormData();
        formData.append('email', email);
        formData.append('password', password);
        
        // Jika kotak "Ingat Saya" dicentang, tambahkan data rememberMe ke FormData
        if (rememberMe) {
            formData.append('rememberMe', 'on');
        }
        
        // Kirim data formulir menggunakan Ajax
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "validate_login.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    // Tanggapan dari server
                    var response = xhr.responseText;
                    if (response == "success") {
                        // Redirect ke halaman OutputData.php jika login berhasil
                        window.location.href = "OutputData.php";
                    } else {
                        // Menampilkan pesan kesalahan jika login gagal
                        showDialog("Email atau password salah");
                    }
                } else {
                    // Menampilkan pesan kesalahan jika terjadi kesalahan koneksi
                    showDialog("Terjadi kesalahan saat mengirim permintaan");
                }
            }
        };
        xhr.send(formData);
    }
});

function isValidEmail(email) {
    return email.includes("@") && email.includes(".");
}

function isValidPassword(password) {
    // Password harus memenuhi persyaratan panjang minimal 8 karakter dan mengandung alfabet, angka, serta simbol.
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/;
    return regex.test(password);
}

function showDialog(message) {
    var dialog = document.createElement("div");
    dialog.textContent = message;
    dialog.style.backgroundColor = "red";
    dialog.style.color = "white";
    dialog.style.padding = "10px";
    dialog.style.position = "fixed";
    dialog.style.top = "50%";
    dialog.style.left = "50%";
    dialog.style.transform = "translate(-50%, -50%)";
    dialog.style.zIndex = "9999";
    document.body.appendChild(dialog);
    setTimeout(function() {
        document.body.removeChild(dialog);
    }, 3000);
}

// Fungsi untuk logout
function logout() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "LogOut.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            if (response == "logout_success") {
                // Redirect ke halaman login setelah logout berhasil
                window.location.href = "InputData.php";
            }
        }
    };
    xhr.send("logout=true");
}
