<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    .container {
        padding: 20px;
    }

    .bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #fff;
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 8px 0;
        box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.1);
    }

    .tab-item {
        text-align: center;
        flex: 1;
        cursor: pointer;
        font-size: 10px;
    }

    .icon {
        font-size: 24px;
        display: block;
        margin-bottom: 5px;
    }

    .label {
        font-size: 10px;
        color: #555;
    }

    .tab-item:hover {
        background-color: #f0f0f0;
        border-radius: 10px;
    }

    .camera-icon {
        font-size: 32px;
        display: block;
        margin-bottom: 5px;
    }

    .camera-tab {
        position: relative;
        top: -10px;
    }
</style>

<div class="bottom-nav">
    <div class="tab-item" id="home-tab">
        <a href="/" class="icon"><i class="fa fa-home"
                style="color: {{ request()->is('/') ? 'green' : 'grey' }}"></i></a>
        <span class="label">Beranda</span>
    </div>
    <div class="tab-item" id="report-tab">
        <a href="{{ route('laporanmu') }}" class="icon"><i class="fa fa-clipboard"
                style="color: {{ request()->is('laporanmu') ? 'green' : 'grey' }}"></i></a>
        <span class="label">Laporanmu</span>
    </div>
    <div class="tab-item" id="camera-tab">
        <a href="{{ route('camera') }}" class="icon"><i class="fa fa-camera"
                style="color: {{ request()->is('camera') ? 'green' : 'grey' }}"></i></a>
        <span class="label">Kamera</span>
    </div>
    <div class="tab-item" id="camera-tab">
        <a href="{{ route('chat') }}" class="icon"><i class="fa fa-comment"
                style="color: {{ request()->is('chat') ? 'green' : 'grey' }}"></i></a>
        <span class="label">Chat</span>
    </div>
    <div class="tab-item" id="profile-tab">
        <a href="{{ route('profile') }}" class="icon"><i class="fa fa-user"
                style="color: {{ request()->is('profile') ? 'green' : 'grey' }}"></i></a>
        <span class="label">Profile</span>
    </div>
</div>
