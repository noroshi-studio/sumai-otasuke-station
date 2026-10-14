<?php
/** Front-page landing page. @package Sumai_Otasuke_Station */
get_header();
$station_phone   = get_theme_mod( 'sos_phone', '093-482-9544' );
$station_address = get_theme_mod( 'sos_address', '〒809-0015 福岡県中間市太賀1丁目2-1' );
$station_map_url = get_theme_mod( 'sos_map_url', 'https://maps.app.goo.gl/yeaZ6yz4LMFyfDXK8?g_st=in' );
?>
  <main id="main">
    <section class="hero hero-story">
      <div class="hero-pattern" aria-hidden="true"></div>
      <div class="hero-world"><?php sos_asset_image( 'sos_hero_image', 'hero-community-v2.jpg', '通谷駅の真横で、庭仕事や家具移動を手伝う人、教室やスマホ相談に集う地域の人々を描いた街のイラスト', '', 'eager' ); ?></div>
      <div class="shell hero-grid">
        <div class="hero-copy reveal">
          <p class="eyebrow"><span>通谷駅</span>の真横・福岡県中間市</p>
          <h1><?php echo wp_kses_post( get_theme_mod( 'sos_main_copy', '住まいの<span>「困った」</span>も、<br>みんなの<span>「やりたい」</span>も。' ) ); ?></h1>
          <p class="hero-lead"><?php echo esc_html( get_theme_mod( 'sos_sub_copy', '暮らしのお困りごとの解決から、趣味・学び・交流のためのスペースまで。地域のみなさまの快適な暮らしとつながりをサポートします。' ) ); ?></p>
          <div class="hero-actions">
            <a class="action-card handyman-action" href="#contact-handyman"><small>草刈り・片付け・修繕など</small><strong><?php echo esc_html( get_theme_mod( 'sos_handyman_cta', '便利屋に相談・無料見積もり' ) ); ?></strong><span>まずは相談してみる →</span></a>
            <a class="action-card space-action" href="#contact-space"><small>教室・集まり・貸切など</small><strong><?php echo esc_html( get_theme_mod( 'sos_space_cta', 'スペースを問い合わせ・予約' ) ); ?></strong><span>使い方を相談してみる →</span></a>
          </div>
          <div class="quick-contact" aria-label="問い合わせ方法"><a href="tel:<?php echo esc_attr( sos_phone_href() ); ?>">お電話 <?php echo esc_html( $station_phone ); ?></a><span>LINE</span><span>フォーム</span><small>電話でのお問い合わせを受け付けています</small></div>
        </div>
        <div class="hero-visual reveal delay-1">
          <div class="hero-frame"><?php sos_asset_image( 'sos_hero_image', 'hero-community-v2.jpg', '通谷駅の真横で便利屋の仕事と地域交流が広がる街のイラスト', '', 'eager' ); ?></div>
          <p class="stamp"><b>地域密着</b><span>NAKAMA</span></p>
          <p class="station-sign">通谷駅の真横<br><small>まちの相談所</small></p>
        </div>
      </div>
      <a class="scroll-cue" href="#entrances"><span></span>SCROLL</a>
    </section>

    <section class="entrances section" id="entrances">
      <div class="shell">
        <header class="section-heading reveal"><p>WHAT CAN WE DO?</p><h2>どちらのご相談ですか？</h2><span>ふたつの入口、ひとつの安心</span></header>
        <div class="entrance-grid stagger">
          <a class="entrance-card handyman-card" href="#handyman">
            <span class="entrance-no">01</span><span class="icon-badge" aria-hidden="true">⌂</span><div><p>おうち・お庭のお困りごと</p><h3>便利屋サービス</h3><span>草刈り、片付け、家具移動、修繕まで</span></div><b>サービスを見る</b>
          </a>
          <a class="entrance-card space-card" href="#space">
            <span class="entrance-no">02</span><span class="icon-badge" aria-hidden="true">◎</span><div><p>教えたい・集まりたい・楽しみたい</p><h3>レンタル＆<br>コミュニティスペース</h3><span>地域交流から貸切イベントまで</span></div><b>スペースを見る</b>
          </a>
        </div>
      </div>
    </section>

    <section class="concept section paper-section">
      <div class="shell concept-grid">
        <div class="concept-art reveal"><?php sos_asset_image( 'sos_concept_image', 'community.svg', '地域の人が自然に集い助け合う様子' ); ?></div>
        <div class="concept-copy reveal delay-1">
          <p class="kicker">街の小さな駅のように。</p>
          <h2>困った人と、力になれる人。<br>やってみたい人と、仲間。<br><em>ここでつながります。</em></h2>
          <p>電球ひとつの交換から、お庭や住まいの工事まで。ちょっとしたおしゃべりから、教室や地域イベントまで。</p>
          <p>「こんなこと、どこに相談したら？」と思ったとき、最初に思い出してもらえる場所へ。用事がなくても立ち寄りたくなる、中間市のあたたかなコミュニティ拠点を目指しています。</p>
          <div class="ticket"><span>合言葉は</span><strong>まずは、話してみよう。</strong><i aria-hidden="true"></i></div>
        </div>
      </div>
    </section>

    <section class="numbers section" aria-labelledby="numbers-title">
      <div class="shell">
        <header class="section-heading light reveal"><p>OUR STATION</p><h2 id="numbers-title">数字で見るステーション</h2></header>
        <div class="number-grid stagger">
          <div class="number-item"><span class="num-icon">広</span><strong><span data-count="105">0</span><small>㎡</small></strong><p>多目的スペース</p></div>
          <div class="number-item"><span class="num-icon">人</span><strong><span data-count="40">0</span><small>名</small></strong><p>最大収容人数</p></div>
          <div class="number-item"><span class="num-icon">駅</span><strong><span class="word-count">真横</span></strong><p>筑豊電気鉄道 通谷駅</p></div>
          <div class="number-item"><span class="num-icon">見</span><strong><span class="word-count">無料</span></strong><p>便利屋のお見積もり</p></div>
        </div>
        <p class="section-note">※スペースの面積・収容人数・駅からの正確な距離は、ご予約／公開前にご確認ください。</p>
      </div>
    </section>

    <section class="services section" id="handyman">
      <div class="shell">
        <header class="section-heading reveal"><p>HANDYMAN SERVICE</p><h2>暮らしの「困った」に、<br class="sp-only">手と知恵を。</h2><span>小さな作業も、専門的な工事も。まずはお話を聞かせてください。</span></header>
        <div class="service-grid stagger">
          <article class="service-card"><div class="service-ill"><?php sos_asset_image( 'sos_service_1_image', 'service-garden.svg', 'お庭のお手入れ' ); ?></div><div class="service-body"><span>01</span><h3><?php echo esc_html( get_theme_mod( 'sos_service_1_title', 'お庭のお手入れ' ) ); ?></h3><?php sos_service_list( 1, "草刈り・雑草対策\n庭木の剪定・伐採\n生垣の整枝\n庭木消毒・落ち葉清掃" ); ?></div></article>
          <article class="service-card"><div class="service-ill"><?php sos_asset_image( 'sos_service_2_image', 'service-cleanup.svg', '不用品整理・片付け' ); ?></div><div class="service-body"><span>02</span><h3><?php echo esc_html( get_theme_mod( 'sos_service_2_title', '不用品整理・片付け' ) ); ?></h3><?php sos_service_list( 2, "部屋の断捨離\nゴミ屋敷の清掃・遺品整理\n不用品処分のご相談\nリサイクル・委託販売" ); ?><small>※処分方法は内容確認後にご案内します。</small></div></article>
          <article class="service-card"><div class="service-ill"><?php sos_asset_image( 'sos_service_3_image', 'service-moving.svg', '家具移動・配置換え' ); ?></div><div class="service-body"><span>03</span><h3><?php echo esc_html( get_theme_mod( 'sos_service_3_title', '家具移動・配置換え' ) ); ?></h3><?php sos_service_list( 3, "大型家具・家電の移動\nお部屋の模様替え\n引っ越しの搬入補助\nオフィス移転のお手伝い" ); ?></div></article>
          <article class="service-card"><div class="service-ill"><?php sos_asset_image( 'sos_service_4_image', 'service-repair.svg', '住まいの修繕・工事' ); ?></div><div class="service-body"><span>04</span><h3><?php echo esc_html( get_theme_mod( 'sos_service_4_title', '住まいの修繕・工事' ) ); ?></h3><?php sos_service_list( 4, "大工・左官・塗装工事\n物置・カーポートの解体撤去\n小さな修理\nリフォーム全般" ); ?></div></article>
        </div>
        <div class="service-callout reveal"><p><strong>ここにないこともご相談ください。</strong><span>「誰に頼めばいいかわからない」ことこそ、便利屋の出番です。</span></p><a class="button primary" href="#contact-handyman">無料で見積もりを相談する</a></div>
      </div>
    </section>

    <section class="reasons section paper-section">
      <div class="shell">
        <header class="section-heading reveal"><p>WHY CHOOSE US?</p><h2>顔が見える、街の便利屋です。</h2></header>
        <div class="reason-grid stagger">
          <article><span>01</span><div class="reason-icon">技</div><h3>経験を活かす<br>幅広い対応力</h3><p>大工・左官・塗装など、熟練職人の技術で小さな修理からリフォームまでご相談いただけます。</p></article>
          <article><span>02</span><div class="reason-icon">近</div><h3>中間市を中心に<br>地域密着</h3><p>暮らしのそばにいるから、相談しやすく迅速。地域のみなさまとの長いお付き合いを大切にします。</p></article>
          <article><span>03</span><div class="reason-icon">安</div><h3>女性スタッフ在籍で<br>相談しやすい</h3><p>一人暮らしの女性やご高齢の方にも配慮。ご不安やご希望を丁寧にうかがいます。</p></article>
          <article><span>04</span><div class="reason-icon">¥0</div><h3>見積もり無料で<br>わかりやすく</h3><p>内容を確認し、作業前に費用をご案内します。納得してからご依頼いただけます。</p></article>
        </div>
      </div>
    </section>

    <section class="space-intro section" id="space">
      <div class="shell space-hero-grid">
        <div class="space-image reveal"><?php sos_asset_image( 'sos_space_image', 'space-interior.svg', '明るい多目的レンタルスペース' ); ?><span>SPACE<br>FOR<br>EVERYONE</span></div>
        <div class="space-copy reveal delay-1">
          <p class="eyebrow mustard">RENTAL &amp; COMMUNITY SPACE</p>
          <h2>集まる。学ぶ。<br>つくる。つながる。</h2>
          <p class="lead">約105㎡、最大40名。<br>あなたの「やってみたい」を形にできる場所。</p>
          <p>地域の交流を目的とした無料開放と、イベントや教室などに使える時間単位の貸切レンタル。用途に合わせてご案内します。</p>
          <dl class="facility-list"><div><dt>広さ</dt><dd><?php echo esc_html( get_theme_mod( 'sos_space_area', '約105㎡' ) ); ?></dd></div><div><dt>定員</dt><dd><?php echo esc_html( get_theme_mod( 'sos_space_capacity', '最大40名' ) ); ?></dd></div><div><dt>立地</dt><dd>通谷駅の真横</dd></div></dl>
          <a class="button mustard-button" href="#contact-space">空き状況・使い方を相談する</a>
        </div>
      </div>
    </section>

    <section class="uses section">
      <div class="shell">
        <header class="section-heading light reveal"><p>HOW TO USE</p><h2>使い方は、あなた次第。</h2><span>いろいろな「やりたい」が似合う、まちの余白です。</span></header>
        <div class="use-tags stagger" aria-label="スペース活用例">
          <span>ワークショップ</span><span>DIYサークル</span><span>ハンドメイド教室</span><span>作品展示</span><span>勉強会</span><span>AI・スマホ講座</span><span>パソコン教室</span><span>情報交換会</span><span>ママ会</span><span>友達同士の集まり</span><span>地域コミュニティ</span><span>貸切イベント</span><span>ポップアップショップ</span><span>定期講座</span><span>会議</span><span>撮影会・貸切撮影</span>
        </div>
        <p class="idea-note reveal">「こんな使い方はできる？」も、お気軽にどうぞ。</p>
      </div>
    </section>

    <section class="plans section paper-section" id="plans">
      <div class="shell">
        <header class="section-heading reveal"><p>USAGE PLAN</p><h2>目的に合わせた、2つの使い方</h2></header>
        <div class="plan-grid stagger">
          <article class="plan-card free"><div class="plan-label">地域の交流に</div><span class="plan-icon">輪</span><h3>コミュニティ<br>無料開放</h3><p class="price"><strong>無料</strong><small>条件あり</small></p><p>地域のつながりや交流を目的とした、非営利の活動などに。</p><ul><li>対象・活動内容の事前確認あり</li><li>空き状況により利用可能</li><li>利用方法は個別にご案内</li></ul><a href="#faq">無料利用の条件を確認する</a></article>
          <article class="plan-card rental"><div class="plan-label">教室・イベント・商用に</div><span class="plan-icon">貸</span><h3>時間単位<br>専用レンタル</h3><p class="price"><strong><?php echo esc_html( get_theme_mod( 'sos_space_price', '880円／時間〜' ) ); ?></strong><small>利用内容・条件により異なります</small></p><p>定期講座、貸切イベント、商業利用、会議や撮影などに。</p><ul><li>事前予約制</li><li>用途・設備・時間を事前確認</li><li>料金と利用条件は予約前にご案内</li></ul><a href="#contact-space">料金・空きを問い合わせる</a></article>
        </div>
        <div class="caution reveal"><strong>ご利用前にご確認ください</strong><p>無料開放は対象となる活動や利用条件があります。「無料」「時間無制限」をすべての利用に保証するものではありません。有料料金も利用内容・時間・設備等により変わる場合があります。予約確定前に最新の条件をご確認ください。</p></div>
      </div>
    </section>

    <section class="pricing section">
      <div class="shell compact-shell">
        <header class="section-heading reveal"><p>PRICE GUIDE</p><h2>料金・サービス概要</h2><span>ご相談内容をうかがい、事前にわかりやすくご案内します。</span></header>
        <div class="price-table reveal" role="table" aria-label="料金概要">
          <div role="row"><div role="cell"><span>便利屋</span><strong>お見積もり</strong></div><div role="cell"><b>無料</b><small>作業料金は内容・規模・必要資材等によりお見積もり</small></div><a href="#contact-handyman">相談する →</a></div>
          <div role="row"><div role="cell"><span>スペース</span><strong>コミュニティ利用</strong></div><div role="cell"><b>無料（条件あり）</b><small>対象・目的・空き状況などを事前に確認</small></div><a href="#contact-space">条件を聞く →</a></div>
          <div role="row"><div role="cell"><span>スペース</span><strong>時間単位レンタル</strong></div><div role="cell"><b><?php echo esc_html( get_theme_mod( 'sos_space_price', '880円／時間〜' ) ); ?></b><small>利用内容・条件により異なるため要確認</small></div><a href="#contact-space">空きを聞く →</a></div>
        </div>
      </div>
    </section>

    <section class="cases section paper-section" id="cases">
      <div class="shell">
        <header class="section-heading split-heading reveal"><div><p>STORIES</p><h2>この街の、うれしい変化。</h2></div><span>公開後は管理画面から事例を追加できます。現在は表示イメージです。</span></header>
        <div class="case-tabs" role="tablist" aria-label="事例の種類"><button role="tab" aria-selected="true" data-case-tab="handyman">便利屋の施工事例</button><button role="tab" aria-selected="false" data-case-tab="space">スペース利用事例</button></div>
        <div class="case-panel stagger" data-case-panel="handyman">
          <?php sos_case_cards( 'handyman_case' ); ?>
        </div>
        <div class="case-panel stagger" data-case-panel="space" hidden>
          <?php sos_case_cards( 'space_case' ); ?>
        </div>
      </div>
    </section>

    <section class="flow section" id="flow">
      <div class="shell">
        <header class="section-heading reveal"><p>HOW IT WORKS</p><h2>ご相談・ご利用の流れ</h2></header>
        <div class="flow-grid stagger">
          <article><span>01</span><div class="flow-visual" aria-hidden="true"><svg viewBox="0 0 80 80" focusable="false"><path d="M13 18h54v36H39L25 65V54H13z"/><path d="M26 34h3m10 0h3m10 0h3"/></svg></div><em>まずは気軽に</em><h3>お問い合わせ</h3><p>電話・LINE・フォームから、ご希望をお聞かせください。</p></article><i></i>
          <article><span>02</span><div class="flow-visual" aria-hidden="true"><svg viewBox="0 0 80 80" focusable="false"><path d="M22 15h31v48H22z"/><path d="M31 15v-4h13v4M30 29l4 4 7-8m-11 22 4 4 7-8m8-14h9m-9 18h9"/><circle cx="58" cy="56" r="9"/><path d="m64 63 7 7"/></svg></div><em>いっしょに確認</em><h3>内容の確認</h3><p>作業内容やスペース用途、日時などを丁寧に確認します。</p></article><i></i>
          <article><span>03</span><div class="flow-visual" aria-hidden="true"><svg viewBox="0 0 80 80" focusable="false"><path d="M18 12h38l8 8v48H18z"/><path d="M56 12v10h8M29 34h24M29 45h16M29 56h11"/><path d="M52 45v15m-6-10h12m-11 4h10"/></svg></div><em>わかりやすく</em><h3>ご案内・お見積もり</h3><p>料金、条件、日程をご案内。便利屋のお見積もりは無料です。</p></article><i></i>
          <article><span>04</span><div class="flow-visual" aria-hidden="true"><svg viewBox="0 0 80 80" focusable="false"><path d="m11 39 29-24 29 24M18 35v32h44V35"/><path d="M32 67V47h16v20"/><path d="M40 37c-9-8-15 5 0 13 15-8 9-21 0-13z"/></svg></div><em>安心してスタート</em><h3>実施・ご利用</h3><p>内容にご納得いただいてから、作業またはご利用開始です。</p></article>
        </div>
      </div>
    </section>

    <section class="news section paper-section" id="news">
      <div class="shell news-grid">
        <header class="section-heading left reveal"><p>NEWS</p><h2>ステーションからの<br>お知らせ</h2><a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>">お知らせ一覧 →</a></header>
        <div class="news-list reveal delay-1"><?php sos_news_items(); ?></div>
      </div>
    </section>

    <section class="faq section" id="faq">
      <div class="shell compact-shell">
        <header class="section-heading reveal"><p>FAQ</p><h2>よくあるご質問</h2></header>
        <div class="accordion reveal"><?php sos_faq_items(); ?></div>
      </div>
    </section>

    <section class="access section paper-section" id="access">
      <div class="shell">
        <header class="section-heading reveal"><p>ACCESS</p><h2>アクセス・店舗情報</h2></header>
        <div class="access-grid">
          <div class="map-embed reveal"><iframe src="https://maps.google.com/maps?q=%E3%80%92809-0015%20%E7%A6%8F%E5%B2%A1%E7%9C%8C%E4%B8%AD%E9%96%93%E5%B8%82%E5%A4%AA%E8%B3%80%EF%BC%91%E4%B8%81%E7%9B%AE%EF%BC%92%E2%88%92%EF%BC%91%20%E3%81%8A%E5%8A%A9%E3%81%91%E4%BE%BF%E5%88%A9%E5%B1%8B%E3%82%B9%E3%83%86%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3&amp;z=16&amp;output=embed" width="700" height="500" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="お助け便利屋ステーションのGoogleマップ"></iframe><a href="<?php echo esc_url( $station_map_url ); ?>" target="_blank" rel="noopener">大きな地図で見る →</a></div>
          <div class="shop-info reveal delay-1">
            <div class="shop-brand"><span class="brand-mark">助</span><div><strong>住まいのお助け</strong><h3>便利屋ステーション</h3></div></div>
            <dl><div><dt>所在地</dt><dd><?php echo esc_html( $station_address ); ?></dd></div><div><dt>アクセス</dt><dd>筑豊電気鉄道「通谷駅」の真横</dd></div><div><dt>営業時間</dt><dd><?php echo esc_html( get_theme_mod( 'sos_hours', '' ) ?: '公開前に設定' ); ?></dd></div><div><dt>定休日</dt><dd><?php echo esc_html( get_theme_mod( 'sos_closed', '' ) ?: '公開前に設定' ); ?></dd></div><div><dt>電話番号</dt><dd><a href="tel:<?php echo esc_attr( sos_phone_href() ); ?>"><?php echo esc_html( $station_phone ); ?></a></dd></div></dl>
            <a class="text-link" href="<?php echo esc_url( $station_map_url ); ?>" target="_blank" rel="noopener">Googleマップで開く →</a>
          </div>
        </div>
      </div>
    </section>

    <section class="contact section" id="contact">
      <div class="shell">
        <header class="contact-heading reveal"><p>CONTACT US</p><h2>「これ、頼める？」から<br>お気軽にどうぞ。</h2><span>ご相談・お見積もりは無料です。わからないことも、まずは一緒に整理します。</span></header>
        <div class="contact-choice stagger">
          <article id="contact-handyman"><span>便利屋のご相談</span><h3>住まいの困りごとを<br>相談したい方</h3><a class="button primary" href="#contact-form">無料見積もりフォームへ</a></article>
          <article id="contact-space"><span>スペースのご相談</span><h3>空き状況・使い方を<br>相談したい方</h3><a class="button mustard-button" href="#contact-form">問い合わせ・予約フォームへ</a></article>
        </div>
        <div class="contact-methods reveal">
          <a href="tel:<?php echo esc_attr( sos_phone_href() ); ?>"><b>電話で相談</b><span><?php echo esc_html( $station_phone ); ?></span></a>
          <?php if ( get_theme_mod( 'sos_line_url', '' ) ) : ?><a href="<?php echo esc_url( get_theme_mod( 'sos_line_url' ) ); ?>" target="_blank" rel="noopener"><b>LINEで相談</b><span>LINE公式アカウントを開く</span></a><?php else : ?><span class="disabled" aria-disabled="true"><b>LINEで相談</b><small>URLは公開前に設定</small></span><?php endif; ?>
        </div>
        <div class="demo-form reveal contact-form-shortcode" id="contact-form">
          <?php $shortcode = get_theme_mod( 'sos_form_shortcode', '' ); if ( $shortcode ) : echo do_shortcode( $shortcode ); else : ?>
            <div class="form-fallback"><strong>お問い合わせフォームは準備中です</strong><p>管理画面の「外観 → カスタマイズ → 店舗・LP設定 → お問い合わせフォーム」でフォームプラグインのショートコードを設定できます。未設定中は、設定済みの電話またはLINEからお問い合わせください。</p></div>
          <?php endif; ?>
        </div>
      </div>
    </section>
  </main>
<?php get_footer(); ?>
