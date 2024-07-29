<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion pedagogique</title>
    <link href="dist/output.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <script src="https://cdn.tailwindcss.com"></script>


    <style>
        .login-container {
            background: linear-gradient(to top right, #9bbce0 0%, #487aa1 100%);
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .login-background {
            background: #d9e8f5;
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 80%;
            border-radius: 10px;
            z-index: -1;
        }

        .bgcolor {
            background-color: #295677;
        }

        .bgcolore {
            background-color: #4E7599AB;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px transparent inset !important;
            -webkit-text-fill-color: #fff !important;
            transition: background-color 5000s ease-in-out 0s;
            background-color: transparent !important;
        }

        input {
            background-color: transparent !important;
        }

        .eye-icon path {
            fill: #f6f5f4 !important;
        }
            /* animation sur formulaire */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-form {
            animation: fadeIn 1s ease-out;
        }
        @keyframes slideIn {
  from { opacity: 0; transform: translateX(-20px); }
  to { opacity: 1; transform: translateX(0); }
}

.input-animation {
  animation: slideIn 1s ease-out;
}
@keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.05); }
  100% { transform: scale(1); }
}

.button-pulse:hover {
  animation: pulse 0.8s infinite;
}
@keyframes rotate {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}

.eye-icon:hover {
  animation: rotate 0.5s linear;
}
.input-focus-animation {
  transition: all 0.3s ease;
}

.input-focus-animation:focus {
  transform: scale(1.02);
  box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
}
@keyframes float {
  0% { transform: translateY(0px); }
  50% { transform: translateY(-5px); }
  100% { transform: translateY(0px); }
}

.logo-animation {
  animation: float 3s ease-in-out infinite;
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.loading {
  display: none;
  width: 20px;
  height: 20px;
  border: 2px solid #fff;
  border-top: 2px solid #007bff;
  border-radius: 50%;
  animation: spin 1s linear infinite;
}
@keyframes floatRotate {
  0% {
    transform: rotate(-6deg) translateY(0px);
  }
  50% {
    transform: rotate(-6deg) translateY(-5px);
  }
  100% {
    transform: rotate(-6deg) translateY(0px);
  }
}

.animate-background {
  animation: floatRotate 6s ease-in-out infinite;
}
@keyframes floatRotate {
  0% {
    transform: rotate(-6deg) translateY(0px);
  }
  25% {
    transform: rotate(-5deg) translateY(-5px);
  }
  50% {
    transform: rotate(-6deg) translateY(-10px);
  }
  75% {
    transform: rotate(-7deg) translateY(-5px);
  }
  100% {
    transform: rotate(-6deg) translateY(0px);
  }
}
.animate-background {
  animation: floatRotate 6s ease-in-out infinite;
  transition: all 0.3s ease;
}
@media (min-width: 640px) {
  .animate-background {
    animation: floatRotate 6s ease-in-out infinite;
  }
}

/* bulle d'animation */
.bubble {
  position: absolute;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.1);
  animation: float 4s ease-in-out infinite;
  z-index: -1;
}

@keyframes float {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-20px);
  }
}

.bubble:nth-child(1) {
  width: 40px;
  height: 40px;
  left: 10%;
  animation-duration: 6s;
}

.bubble:nth-child(2) {
  width: 60px;
  height: 60px;
  left: 20%;
  top: 40%;
  animation-duration: 8s;
}

.bubble:nth-child(3) {
  width: 30px;
  height: 30px;
  left: 35%;
  top: 60%;
  animation-duration: 5s;
}

.bubble:nth-child(4) {
  width: 50px;
  height: 50px;
  left: 70%;
  top: 10%;
  animation-duration: 7s;
}

.bubble:nth-child(5) {
  width: 35px;
  height: 35px;
  left: 55%;
  top: 70%;
  animation-duration: 9s;
}

.bubble:nth-child(6) {
  width: 45px;
  height: 45px;
  left: 85%;
  top: 30%;
  animation-duration: 6.5s;
}
.bubble {
  position: absolute;
  border-radius: 50%;
  background: rgba(41, 86, 119, 0.5);
  backdrop-filter: blur(5px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
  animation: float 4s ease-in-out infinite;
  z-index: -1;
}
@keyframes floatRotate {
  0%, 100% {
    transform: translateY(0) rotate(0deg);
  }
  50% {
    transform: translateY(-20px) rotate(180deg);
  }
}

.bubble {
  /* ... autres styles ... */
  animation: floatRotate 4s ease-in-out infinite;
}

    </style>

</head>