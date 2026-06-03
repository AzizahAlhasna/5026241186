<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@dubscommunity | Linktree</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');

    :root {
      --gsw-blue: #1D428A;
      --gsw-gold: #FFC72C;
      --bg: #EBEBEB;
      --card-bg: #FFFFFF;
      --text-dark: #1a1a1a;
      --text-muted: #555;
      --radius: 14px;
      --font: 'DM Sans', 'LinkSans', sans-serif;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      background-color: var(--bg);
      font-family: var(--font);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 40px 16px 80px;
    }

    /* ── TOP ICON ── */
    .top-bar {
      width: 100%;
      max-width: 560px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 28px;
    }
    .top-bar .icon-btn {
      width: 42px; height: 42px;
      border-radius: 50%;
      background: var(--card-bg);
      border: none;
      display: flex; align-items: center; justify-content: center;
      font-size: 18px;
      box-shadow: 0 1px 4px rgba(0,0,0,.12);
      cursor: pointer;
      color: var(--text-dark);
    }

    /* ── CARD WRAPPER ── */
    .lt-card {
      background: #F5F5F5;
      border-radius: 26px;
      width: 100%;
      max-width: 560px;
      padding: 36px 28px 32px;
      box-shadow: 0 2px 24px rgba(0,0,0,.08);
    }

    /* ── AVATAR ── */
    .avatar-wrap {
      display: flex;
      justify-content: center;
      margin-bottom: 18px;
    }
    .avatar-ring {
      width: 92px; height: 92px;
      border-radius: 50%;
      border: 3px solid var(--gsw-blue);
      overflow: hidden;
      background: #d0d8e8;
      display: flex; align-items: center; justify-content: center;
      position: relative;
    }
    .avatar-ring img {
      width: 100%; height: 100%;
      object-fit: cover;
    }
    .avatar-placeholder {
      display: flex; flex-direction: column;
      align-items: center; justify-content: center;
      color: var(--gsw-blue);
      font-size: 11px;
      font-weight: 600;
      text-align: center;
      gap: 4px;
    }
    .avatar-placeholder i { font-size: 28px; }

    /* ── PROFILE INFO ── */
    .profile-name {
      text-align: center;
      font-size: 1.35rem;
      font-weight: 700;
      color: var(--text-dark);
      letter-spacing: -.3px;
      margin-bottom: 6px;
    }
    .profile-bio {
      text-align: center;
      font-size: .88rem;
      color: var(--text-muted);
      margin-bottom: 20px;
    }

    /* ── SOCIAL ICONS ── */
    .social-row {
      display: flex;
      justify-content: center;
      gap: 22px;
      margin-bottom: 28px;
    }
    .social-row a {
      font-size: 20px;
      color: var(--text-dark);
      text-decoration: none;
      transition: transform .15s, color .15s;
    }
    .social-row a:hover {
      color: var(--gsw-blue);
      transform: scale(1.15);
    }

    /* ── LINK CARDS ── */
    .link-item {
      background: var(--card-bg);
      border-radius: var(--radius);
      display: flex;
      align-items: center;
      padding: 10px 14px;
      margin-bottom: 10px;
      text-decoration: none;
      color: var(--text-dark);
      box-shadow: 0 1px 3px rgba(0,0,0,.07);
      transition: box-shadow .18s, transform .12s;
      position: relative;
    }
    .link-item:hover {
      box-shadow: 0 4px 16px rgba(29,66,138,.13);
      transform: translateY(-1px);
      color: var(--text-dark);
    }

    /* Thumbnail */
    .link-thumb {
      width: 52px; height: 52px;
      border-radius: 8px;
      overflow: hidden;
      flex-shrink: 0;
      background: #dde3ee;
      display: flex; align-items: center; justify-content: center;
      margin-right: 14px;
      color: var(--gsw-blue);
      font-size: 11px;
      font-weight: 600;
      text-align: center;
    }
    .link-thumb img {
      width: 100%; height: 100%;
      object-fit: cover;
    }
    .link-thumb .ph-icon { font-size: 22px; }
    .link-thumb .ph-label { font-size: 9px; line-height: 1.2; margin-top: 2px; }

    .link-label {
      font-size: .9rem;
      font-weight: 600;
      text-align: center;
      flex: 1;
    }

    .link-dots {
      color: #bbb;
      font-size: 18px;
      padding-left: 8px;
    }

    /* ── FOOTER ── */
    .lt-footer {
      margin-top: 28px;
      text-align: center;
    }
    .lt-footer p {
      font-size: .78rem;
      color: #888;
      margin-bottom: 4px;
    }
    .lt-footer a { color: #888; text-decoration: none; margin: 0 6px; }
    .lt-footer a:hover { color: var(--gsw-blue); }

    /* ── BOTTOM BAR ── */
    .bottom-bar {
      position: fixed;
      bottom: 0; left: 0; right: 0;
      background: linear-gradient(to top, rgba(0,0,0,.7) 0%, transparent 100%);
      padding: 16px 0 22px;
      display: flex; flex-direction: column; align-items: center;
      gap: 6px;
    }
    .url-pill {
      background: rgba(255,255,255,.92);
      border-radius: 999px;
      padding: 8px 22px;
      font-size: .85rem;
      font-weight: 600;
      color: #222;
      display: flex; align-items: center; gap: 10px;
      box-shadow: 0 2px 12px rgba(0,0,0,.18);
    }
    .url-pill .close-x { color: #999; font-size: 14px; cursor: pointer; }
    .join-text {
      color: rgba(255,255,255,.85);
      font-size: .8rem;
    }
  </style>
</head>
<body>

  <!-- Top bar -->
  <div class="top-bar">
    <button class="icon-btn"><i class="bi bi-asterisk"></i></button>
    <button class="icon-btn"><i class="bi bi-box-arrow-up"></i></button>
  </div>

  <!-- Main card -->
  <div class="lt-card">

    <!-- Avatar -->
    <div class="avatar-wrap">
      <div class="avatar-ring">
          <img src="fotolinktree/fotolt1.jpeg" alt="dubscommunity" />
      </div>
    </div>

    <!-- Name & bio -->
    <div class="profile-name">@dubscommunity</div>
    <div class="profile-bio">Welcome to Golden State Warriors Community Page!</div>

    <!-- Social icons -->
    <div class="social-row">
      <a href="#" title="Email"><i class="bi bi-envelope-fill"></i></a>
      <a href="#" title="X / Twitter"><i class="bi bi-twitter-x"></i></a>
      <a href="#" title="YouTube"><i class="bi bi-youtube"></i></a>
      <a href="#" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
    </div>

    <!-- Link 1 -->
    <a href="#" class="link-item">
      <div class="link-thumb">
        <img src="fotolinktree/fotolt2.jpeg" alt="dubscommunity" />
      </div>
      <span class="link-label">Golden State Community Foundation Auction</span>
      <i class="bi bi-three-dots-vertical link-dots"></i>
    </a>

    <!-- Link 2 -->
    <a href="#" class="link-item">
      <div class="link-thumb">
        <img src="fotolinktree/fotolt3.jpeg" alt="dubscommunity" />
      </div>
      <span class="link-label">Nominate an Impact Warrior</span>
      <i class="bi bi-three-dots-vertical link-dots"></i>
    </a>

    <!-- Link 3 -->
    <a href="#" class="link-item">
      <div class="link-thumb">
        <img src="fotolinktree/fotolt4.jpeg" alt="dubscommunity" />
      </div>
      <span class="link-label">Sign Up for the Warriors In the Community Newsletter</span>
      <i class="bi bi-three-dots-vertical link-dots"></i>
    </a>

    <!-- Link 4 -->
    <a href="#" class="link-item">
      <div class="link-thumb">
        <img src="fotolinktree/fotolt5.jpeg" alt="dubscommunity" />
      </div>
      <span class="link-label">Golden State Community Foundation Youth Basketball Scholarship</span>
      <i class="bi bi-three-dots-vertical link-dots"></i>
    </a>

    <!-- Link 5 -->
    <a href="#" class="link-item">
      <div class="link-thumb">
        <img src="fotolinktree/fotolt6.jpeg" alt="dubscommunity" />
      </div>
      <span class="link-label">Swishes for Dishes</span>
      <i class="bi bi-three-dots-vertical link-dots"></i>
    </a>

    <!-- Link 6 -->
    <a href="#" class="link-item">
      <div class="link-thumb">
        <img src="fotolinktree/fotolt7.jpeg" alt="dubscommunity" />
      </div>
      <span class="link-label">Generation Thrive</span>
      <i class="bi bi-three-dots-vertical link-dots"></i>
    </a>

    <!-- Link 7 -->
    <a href="#" class="link-item">
      <div class="link-thumb">
        <img src="fotolinktree/fotolt8.jpg" alt="dubscommunity" />
      </div>
      <span class="link-label">Learn more about Warriors In The Community</span>
      <i class="bi bi-three-dots-vertical link-dots"></i>
    </a>

    <!-- Link 8 -->
    <a href="#" class="link-item">
      <div class="link-thumb">
        <img src="fotolinktree/fotolt9.jpg" alt="dubscommunity" />
      </div>
      <span class="link-label">Order a Warriors Scoreboard Message at Chase Center</span>
      <i class="bi bi-three-dots-vertical link-dots"></i>
    </a>

    <!-- Link 9 -->
    <a href="#" class="link-item">
      <div class="link-thumb">
        <img src="fotolinktree/fotolt8.jpg" alt="dubscommunity" />
      </div>
      <span class="link-label">In-Kind Donations and Sponsorship Requests</span>
      <i class="bi bi-three-dots-vertical link-dots"></i>
    </a>

    <!-- Link 10 -->
    <a href="#" class="link-item">
      <div class="link-thumb">
        <img src="fotolinktree/fotolt1.jpeg" alt="dubscommunity" />
      </div>
      <span class="link-label">Golden State Warriors</span>
      <i class="bi bi-three-dots-vertical link-dots"></i>
    </a>

    <!-- Footer links -->
    <div class="lt-footer">
      <p>
        <a href="#">Cookie Preferences</a> ·
        <a href="#">Report</a> ·
        <a href="#">Privacy</a> ·
        <a href="#">Explore</a>
      </p>
    </div>

  </div><!-- end lt-card -->

  <div class="bottom-bar">
    <div class="url-pill">
      linktr.ee/you
      <span class="close-x"><i class="bi bi-x"></i></span>
    </div>
    <span class="join-text">Join dubscommunity on Linktree today</span>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>