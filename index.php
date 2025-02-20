<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>موس کامبت</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap');

    body {
      text-align: center;
      font-family: 'Vazirmatn', sans-serif;
      background: linear-gradient(135deg, #1e1e1e, #333);
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
      overflow-x: hidden;
    }

    h1 {
      font-size: 3rem;
      margin-bottom: 20px;
      background: linear-gradient(90deg, #00c853, #00e676);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-shadow: 2px 2px 10px rgba(0, 255, 0, 0.5);
    }

    .container {
      background: rgba(30, 30, 30, 0.95);
      padding: 25px;
      border-radius: 20px;
      box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.4);
      width: 90%;
      max-width: 450px;
      backdrop-filter: blur(10px);
      margin-bottom: 30px;
    }

    .status {
      font-size: 2rem;
      margin: 15px 0;
      font-weight: bold;
      text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
    }

    /* دکمه کلیک: دایره‌ای، بزرگ و با افکت‌های بی‌نهایت */
    #clickButton {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      font-size: 2rem;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 20px auto;
      background: radial-gradient(circle, #00c853, #00e676);
      box-shadow: 0px 8px 20px rgba(0, 255, 0, 0.5);
      transition: all 0.3s ease;
      border: none;
      font-weight: bold;
      position: relative;
      overflow: hidden;
      animation: pulse 2s infinite;
    }

    #clickButton:hover {
      transform: scale(1.15);
      background: radial-gradient(circle, #00e676, #00ff7f);
    }

    #clickButton:disabled {
      background: #555;
      cursor: not-allowed;
      box-shadow: none;
      animation: none;
    }

    /* دکمه ارتقا */
    #upgradeButton {
      font-size: 1.5rem;
      padding: 15px;
      border: none;
      border-radius: 15px;
      background: linear-gradient(90deg, #ff9800, #ff5722);
      color: white;
      cursor: pointer;
      transition: all 0.3s ease;
      width: 100%;
      margin: 10px 0;
      box-shadow: 0px 4px 10px rgba(255, 87, 34, 0.5);
      font-weight: bold;
      animation: pulse 3s infinite;
    }

    #upgradeButton:hover {
      transform: scale(1.05);
      background: linear-gradient(90deg, #ff5722, #ff3d00);
    }

    /* دکمه ریست بازی */
    #resetButton {
      font-size: 1.5rem;
      padding: 15px;
      border: none;
      border-radius: 15px;
      background: linear-gradient(90deg, #8e2de2, #4a00e0);
      color: white;
      cursor: pointer;
      transition: all 0.3s ease;
      width: 100%;
      margin: 10px 0;
      box-shadow: 0px 4px 10px rgba(138, 43, 226, 0.5);
      font-weight: bold;
      animation: pulse 3s infinite;
    }

    #resetButton:hover {
      transform: scale(1.05);
      background: linear-gradient(90deg, #4a00e0, #8e2de2);
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }

    /* بخش کارت‌های درآمدزا */
    .cards-section {
      width: 90%;
      max-width: 450px;
      background: rgba(30,30,30,0.95);
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.4);
      backdrop-filter: blur(10px);
      margin-bottom: 30px;
    }

    .cards-section h2 {
      font-size: 2rem;
      margin-bottom: 20px;
      background: linear-gradient(90deg, #ff9800, #ff5722);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .card {
      background: linear-gradient(135deg, #ff9800, #ff5722);
      border-radius: 15px;
      padding: 15px;
      margin-bottom: 15px;
      box-shadow: 0px 4px 10px rgba(255,87,34,0.5);
      display: flex;
      flex-direction: column;
      align-items: center;
      animation: infiniteGlow 3s infinite;
    }

    .card h3 {
      margin: 0 0 10px 0;
      font-size: 1.5rem;
      color: #fff;
    }

    .card p {
      margin: 5px 0;
      font-size: 1.2rem;
    }

    .card button {
      font-size: 1rem;
      padding: 10px 15px;
      border: none;
      border-radius: 10px;
      background: #fff;
      color: #ff5722;
      cursor: pointer;
      transition: transform 0.3s ease;
      margin-top: 10px;
    }

    .card button:hover {
      transform: scale(1.1);
    }

    @keyframes infiniteGlow {
      0%, 100% {
        box-shadow: 0 0 10px rgba(255,255,255,0.5);
      }
      50% {
        box-shadow: 0 0 20px rgba(255,255,255,1);
      }
    }
  </style>
  <script>
    (function () {
      // تعریف داده‌های کارت‌ها
      const cardTypes = [
        { id: "card1", name: "کارت برونزی", income: 1, multiplier: 1.5 },
        { id: "card2", name: "کارت نقره‌ای", income: 5, multiplier: 1.6 },
        { id: "card3", name: "کارت طلایی", income: 10, multiplier: 1.7 }
      ];

      // مقداردهی اولیه داده‌های بازی
      let gameData = JSON.parse(localStorage.getItem("gameData")) || {
        score: 0,
        clickValue: 1,
        upgradeCost: 10,
        energy: 10,
        maxEnergy: 10,
        lastEnergyTime: Date.now(),
        cards: {
          card1: { count: 0, cost: 100 },
          card2: { count: 0, cost: 500 },
          card3: { count: 0, cost: 2000 }
        }
      };

      function saveGame() {
        localStorage.setItem("gameData", JSON.stringify(gameData));
      }

      // پخش افکت صوتی کوتاه هنگام کلیک
      function playClickSound() {
        try {
          let context = new (window.AudioContext || window.webkitAudioContext)();
          let oscillator = context.createOscillator();
          oscillator.type = 'triangle';
          oscillator.frequency.setValueAtTime(200, context.currentTime);
          oscillator.connect(context.destination);
          oscillator.start();
          oscillator.stop(context.currentTime + 0.1);
        } catch (e) {
          // در صورت عدم پشتیبانی یا خطا، صدا پخش نمی‌شود
        }
      }

      function hitMouse() {
        if (gameData.energy > 0) {
          playClickSound();
          gameData.score += gameData.clickValue;
          gameData.energy--;
          saveGame();
          updateUI();
        } else {
          alert("انرژی کافی نداری! منتظر بمون تا بازیابی بشه.");
        }
      }

      function buyUpgrade() {
        if (gameData.score >= gameData.upgradeCost) {
          gameData.score -= gameData.upgradeCost;
          gameData.clickValue++;
          gameData.upgradeCost = Math.floor(gameData.upgradeCost * 1.5);
          saveGame();
          updateUI();
        } else {
          alert("امتیاز کافی برای ارتقا نداری!");
        }
      }

      function resetGame() {
        if (confirm("آیا مطمئن هستید که می‌خواهید بازی را ریست کنید؟")) {
          gameData = {
            score: 0,
            clickValue: 1,
            upgradeCost: 10,
            energy: 10,
            maxEnergy: 10,
            lastEnergyTime: Date.now(),
            cards: {
              card1: { count: 0, cost: 100 },
              card2: { count: 0, cost: 500 },
              card3: { count: 0, cost: 2000 }
            }
          };
          saveGame();
          updateUI();
          updateCardsUI();
        }
      }

      // درآمد غیرفعال از کارت‌ها (هر ثانیه)
      function passiveIncome() {
        let totalIncome = 0;
        cardTypes.forEach(function(card) {
          let cardData = gameData.cards[card.id];
          totalIncome += cardData.count * card.income;
        });
        if (totalIncome > 0) {
          gameData.score += totalIncome;
          saveGame();
          updateUI();
        }
      }

      function updateUI() {
        document.getElementById("score").innerText = "امتیاز: " + gameData.score;
        document.getElementById("energy").innerText = "انرژی: " + gameData.energy + "/" + gameData.maxEnergy;
        document.getElementById("upgradeButton").innerText = "افزایش قدرت کلیک (هزینه: " + gameData.upgradeCost + ")";
        document.getElementById("clickButton").disabled = (gameData.energy === 0);
        updateCardsUI();
      }

      function updateCardsUI() {
        let container = document.getElementById("cardsContainer");
        container.innerHTML = "";
        cardTypes.forEach(function(card) {
          let cardData = gameData.cards[card.id];
          let cardDiv = document.createElement("div");
          cardDiv.className = "card";
          cardDiv.innerHTML = `
            <h3>${card.name}</h3>
            <p>تعداد: ${cardData.count}</p>
            <p>هزینه: ${cardData.cost}</p>
            <p>درآمد: ${card.income} کوین/ثانیه</p>
            <button onclick="buyCard('${card.id}')">خرید</button>
          `;
          container.appendChild(cardDiv);
        });
      }

      function buyCard(cardId) {
        let cardType = cardTypes.find(c => c.id === cardId);
        let cardData = gameData.cards[cardId];
        if (gameData.score >= cardData.cost) {
          gameData.score -= cardData.cost;
          cardData.count++;
          cardData.cost = Math.floor(cardData.cost * cardType.multiplier);
          saveGame();
          updateUI();
        } else {
          alert("امتیاز کافی برای خرید این کارت نداری!");
        }
      }

      // ست کردن تایمرها
      setInterval(function() {
        // بازیابی انرژی هر 1500 میلی‌ثانیه
        let now = Date.now();
        let timePassed = Math.floor((now - gameData.lastEnergyTime) / 1500);
        if (timePassed > 0) {
          gameData.energy = Math.min(gameData.maxEnergy, gameData.energy + timePassed);
          gameData.lastEnergyTime = now;
          saveGame();
          updateUI();
        }
      }, 1500);

      setInterval(passiveIncome, 1000);

      window.onload = function() {
        updateUI();
      };

      window.hitMouse = hitMouse;
      window.buyUpgrade = buyUpgrade;
      window.resetGame = resetGame;
      window.buyCard = buyCard;
    })();
  </script>
</head>
<body>
  <h1>🐭 موس کامبت 🐭</h1>
  <div class="container">
    <p id="score" class="status">امتیاز: 0</p>
    <p id="energy" class="status">انرژی: 10/10</p>
    <button id="clickButton" onclick="hitMouse()">💰</button>
    <button id="upgradeButton" onclick="buyUpgrade()">⚡ افزایش قدرت کلیک (هزینه: 10)</button>
    <button id="resetButton" onclick="resetGame()">🔄 ریست بازی</button>
  </div>

  <div class="cards-section">
    <h2>کارت‌های درآمدزا</h2>
    <div id="cardsContainer"></div>
  </div>
</body>
</html>
