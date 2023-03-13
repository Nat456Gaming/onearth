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
                <h3 id="challenges-tab">Challenges</h3>
            </button>
            <button onclick="tab(false)">
                <h3 id="people-tab" style="border: none;">People</h3>
            </button>
        </div>
    </div>

    <div id="challenges" style="display: block;">
        <p>Challenges</p>
    </div>
    <div id="people" style="display: none;">
        <p>People</p>
    </div>
</section>