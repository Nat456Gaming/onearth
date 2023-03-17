<section id="search" class="pages" style="display: none">
    <div id="head-bar">
        <div id="search-container">
            <form onSubmit="search(); return false;" id="search-form">
                <input type="text" placeholder="Search ..." name="search-bar">
            </form>
            <button onclick="search()" id="srh-button">
                <span class="material-icons" style="color: #252525">search</span>
            </button>
        </div>
        <div id="search-tab">
            <button onclick="tab(true)">
                <h2 id="challenges-tab">Challenges</h2>
            </button>
            <button onclick="tab(false)">
                <h2 id="people-tab" style="border: none;">People</h2>
            </button>
        </div>
    </div>

    <div id="result_page">
        <button class="search-result">
            <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-05.jpg" class="result-img"/>
            <div class="text-result">
                <h3>What if you were in an other gender?</h3>
                <p>Write a short story about this idea...</p>
            </div>
        </button>
        <button class="search-result profile">
            <img src="images/nat456.png" class="result-profile-img"/>
            <h3>Nat456</h3>
        </button>
    </div>
</section>