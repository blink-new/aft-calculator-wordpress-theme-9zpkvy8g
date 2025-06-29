<div id="aft-calculator" class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 max-w-2xl mx-auto">
  <form id="aftForm" autocomplete="off">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
      <div>
        <label class="block mb-1 font-semibold text-gray-700 dark:text-gray-200">Gender</label>
        <select id="gender" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white">
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
      <div>
        <label class="block mb-1 font-semibold text-gray-700 dark:text-gray-200">Age Group</label>
        <select id="age" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white">
          <option value="17-21">17-21</option>
          <option value="22-26">22-26</option>
          <option value="27-31">27-31</option>
          <option value="32-36">32-36</option>
          <option value="37-41">37-41</option>
          <option value="42-46">42-46</option>
          <option value="47-51">47-51</option>
          <option value="52-56">52-56</option>
          <option value="57-61">57-61</option>
          <option value="62+">62+</option>
        </select>
      </div>
      <div>
        <label class="block mb-1 font-semibold text-gray-700 dark:text-gray-200">MOS</label>
        <select id="mos" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white">
          <option value="heavy">Heavy</option>
          <option value="significant">Significant</option>
          <option value="moderate">Moderate</option>
        </select>
      </div>
    </div>
    <div class="space-y-6">
      <!-- MDL -->
      <div>
        <label class="block font-semibold text-gray-700 dark:text-gray-200 mb-1">3 Rep Max Deadlift (MDL)</label>
        <div class="flex items-center gap-2">
          <input type="range" id="mdl" min="60" max="340" value="140" step="5" class="w-full accent-yellow-500" oninput="updateAFTScore()">
          <input type="number" id="mdlValue" min="60" max="340" value="140" step="5" class="w-20 rounded border-gray-300 dark:bg-gray-700 dark:text-white" oninput="updateAFTScore()">
          <select id="mdlUnit" class="rounded border-gray-300 dark:bg-gray-700 dark:text-white" onchange="updateAFTScore()">
            <option value="lb">lb</option>
            <option value="kg">kg</option>
          </select>
        </div>
        <progress id="mdlProgress" value="0" max="100" class="w-full h-2 mt-2"></progress>
        <span id="mdlScore" class="ml-2 font-bold"></span>
      </div>
      <!-- HRP -->
      <div>
        <label class="block font-semibold text-gray-700 dark:text-gray-200 mb-1">Hand Release Push-Up (HRP)</label>
        <div class="flex items-center gap-2">
          <input type="range" id="hrp" min="10" max="60" value="30" step="1" class="w-full accent-yellow-500" oninput="updateAFTScore()">
          <input type="number" id="hrpValue" min="10" max="60" value="30" step="1" class="w-20 rounded border-gray-300 dark:bg-gray-700 dark:text-white" oninput="updateAFTScore()">
          <span>reps</span>
        </div>
        <progress id="hrpProgress" value="0" max="100" class="w-full h-2 mt-2"></progress>
        <span id="hrpScore" class="ml-2 font-bold"></span>
      </div>
      <!-- SDC -->
      <div>
        <label class="block font-semibold text-gray-700 dark:text-gray-200 mb-1">Sprint-Drag-Carry (SDC)</label>
        <div class="flex items-center gap-2">
          <input type="range" id="sdc" min="90" max="200" value="120" step="1" class="w-full accent-yellow-500" oninput="updateAFTScore()">
          <input type="number" id="sdcValue" min="90" max="200" value="120" step="1" class="w-20 rounded border-gray-300 dark:bg-gray-700 dark:text-white" oninput="updateAFTScore()">
          <span>sec</span>
        </div>
        <progress id="sdcProgress" value="0" max="100" class="w-full h-2 mt-2"></progress>
        <span id="sdcScore" class="ml-2 font-bold"></span>
      </div>
      <!-- PLK -->
      <div>
        <label class="block font-semibold text-gray-700 dark:text-gray-200 mb-1">Plank (PLK)</label>
        <div class="flex items-center gap-2">
          <input type="range" id="plk" min="60" max="300" value="120" step="5" class="w-full accent-yellow-500" oninput="updateAFTScore()">
          <input type="number" id="plkValue" min="60" max="300" value="120" step="5" class="w-20 rounded border-gray-300 dark:bg-gray-700 dark:text-white" oninput="updateAFTScore()">
          <span>sec</span>
        </div>
        <progress id="plkProgress" value="0" max="100" class="w-full h-2 mt-2"></progress>
        <span id="plkScore" class="ml-2 font-bold"></span>
      </div>
      <!-- 2MR -->
      <div>
        <label class="block font-semibold text-gray-700 dark:text-gray-200 mb-1">Two-Mile Run (2MR)</label>
        <div class="flex items-center gap-2">
          <input type="range" id="mr2" min="720" max="1800" value="900" step="5" class="w-full accent-yellow-500" oninput="updateAFTScore()">
          <input type="number" id="mr2Value" min="720" max="1800" value="900" step="5" class="w-20 rounded border-gray-300 dark:bg-gray-700 dark:text-white" oninput="updateAFTScore()">
          <span>sec</span>
        </div>
        <progress id="mr2Progress" value="0" max="100" class="w-full h-2 mt-2"></progress>
        <span id="mr2Score" class="ml-2 font-bold"></span>
      </div>
    </div>
    <div class="mt-8 flex flex-col md:flex-row gap-4 items-center justify-between">
      <div>
        <span class="font-bold text-lg text-gray-900 dark:text-white">Total Score: <span id="totalScore">0</span></span>
        <span id="passFail" class="ml-4 font-bold"></span>
      </div>
      <div class="flex gap-2">
        <button type="button" id="exportPDF" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Download PDF</button>
        <button type="button" id="shareImage" class="bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded">Share Image</button>
      </div>
    </div>
    <div class="mt-8">
      <canvas id="radarChart" width="400" height="300"></canvas>
    </div>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/inc/calculator.js"></script>
