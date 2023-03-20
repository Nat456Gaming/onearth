<section id="settings" class="pages" style="display: none">
    <form onSubmit="return false;" id="settings-form">
        <div class="setting"> 
            <h4>Option 1</h4>
            <label class="switch">
                <input onclick="settings_update(true);" type="checkbox">
                <span class="slider"></span>
            </label>
        </div>
        <div class="setting"> 
            <h4>Option 2</h4>
            <label class="switch">
                <input onclick="settings_update(true);" type="checkbox">
                <span class="slider"></span>
            </label>
        </div>
        <button onclick="settings_update(false);" id="settings-submit" style="display: none;"><h3>Submit</h3></button>
    </form>
</section>