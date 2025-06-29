// --- AFT Calculator Logic ---
// This is a simplified version. For production, use official DoD tables for each event, gender, age, MOS.

function getScore(event, value, gender, age, mos) {
  // Placeholder: Replace with real DoD scoring tables
  // For demo, linear scale: min=60, max=100 per event
  let min = 0, max = 100, score = 0;
  switch(event) {
    case 'mdl': min = 60; max = 340; score = Math.round(((value - min) / (max - min)) * 100); break;
    case 'hrp': min = 10; max = 60; score = Math.round(((value - min) / (max - min)) * 100); break;
    case 'sdc': min = 200; max = 90; score = Math.round(((max - value) / (max - min)) * 100); break;
    case 'plk': min = 60; max = 300; score = Math.round(((value - min) / (max - min)) * 100); break;
    case 'mr2': min = 1800; max = 720; score = Math.round(((min - value) / (min - max)) * 100); break;
  }
  if (score < 0) score = 0;
  if (score > 100) score = 100;
  return score;
}

function updateAFTScore() {
  const gender = document.getElementById('gender').value;
  const age = document.getElementById('age').value;
  const mos = document.getElementById('mos').value;

  // MDL
  let mdl = parseInt(document.getElementById('mdl').value);
  document.getElementById('mdlValue').value = mdl;
  let mdlScore = getScore('mdl', mdl, gender, age, mos);
  document.getElementById('mdlScore').innerText = mdlScore;
  document.getElementById('mdlProgress').value = mdlScore;

  // HRP
  let hrp = parseInt(document.getElementById('hrp').value);
  document.getElementById('hrpValue').value = hrp;
  let hrpScore = getScore('hrp', hrp, gender, age, mos);
  document.getElementById('hrpScore').innerText = hrpScore;
  document.getElementById('hrpProgress').value = hrpScore;

  // SDC
  let sdc = parseInt(document.getElementById('sdc').value);
  document.getElementById('sdcValue').value = sdc;
  let sdcScore = getScore('sdc', sdc, gender, age, mos);
  document.getElementById('sdcScore').innerText = sdcScore;
  document.getElementById('sdcProgress').value = sdcScore;

  // PLK
  let plk = parseInt(document.getElementById('plk').value);
  document.getElementById('plkValue').value = plk;
  let plkScore = getScore('plk', plk, gender, age, mos);
  document.getElementById('plkScore').innerText = plkScore;
  document.getElementById('plkProgress').value = plkScore;

  // 2MR
  let mr2 = parseInt(document.getElementById('mr2').value);
  document.getElementById('mr2Value').value = mr2;
  let mr2Score = getScore('mr2', mr2, gender, age, mos);
  document.getElementById('mr2Score').innerText = mr2Score;
  document.getElementById('mr2Progress').value = mr2Score;

  // Total
  let total = mdlScore + hrpScore + sdcScore + plkScore + mr2Score;
  document.getElementById('totalScore').innerText = total;
  let pass = mdlScore >= 60 && hrpScore >= 60 && sdcScore >= 60 && plkScore >= 60 && mr2Score >= 60;
  document.getElementById('passFail').innerHTML = pass ? '<span class="text-green-600">PASS &#x1F60A;</span>' : '<span class="text-red-600">FAIL &#x1F641;</span>';

  // Radar chart
  updateRadarChart([mdlScore, hrpScore, sdcScore, plkScore, mr2Score]);
}

// Sync sliders and number inputs
['mdl','hrp','sdc','plk','mr2'].forEach(id => {
  document.getElementById(id).addEventListener('input', e => {
    document.getElementById(id+'Value').value = e.target.value;
    updateAFTScore();
  });
  document.getElementById(id+'Value').addEventListener('input', e => {
    document.getElementById(id).value = e.target.value;
    updateAFTScore();
  });
});

// Radar chart
let radarChart;
function updateRadarChart(scores) {
  const ctx = document.getElementById('radarChart').getContext('2d');
  if (radarChart) radarChart.destroy();
  radarChart = new Chart(ctx, {
    type: 'radar',
    data: {
      labels: ['MDL','HRP','SDC','PLK','2MR'],
      datasets: [
        {
          label: 'Your Score',
          data: scores,
          backgroundColor: 'rgba(251,191,36,0.2)',
          borderColor: '#FBBF24',
          borderWidth: 2
        },
        {
          label: 'Minimum Standard',
          data: [60,60,60,60,60],
          backgroundColor: 'rgba(55,65,81,0.1)',
          borderColor: '#374151',
          borderWidth: 1,
          borderDash: [5,5]
        }
      ]
    },
    options: {
      responsive: true,
      plugins: { legend: { position: 'top' } },
      scales: { r: { min: 0, max: 100, ticks: { stepSize: 20 } } }
    }
  });
}

// Export PDF (placeholder)
document.getElementById('exportPDF').addEventListener('click', function() {
  alert('PDF export coming soon!');
});
// Share Image (placeholder)
document.getElementById('shareImage').addEventListener('click', function() {
  alert('Image sharing coming soon!');
});

// Initial update
updateAFTScore();
