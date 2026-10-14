# 住まいのお助け便利屋ステーション

制作途中のホームページのソースです。WordPressテーマを本体として維持し、`static/` にブラウザで確認できる静的版を保存しています。GitHubへの保存とWeb公開は別の作業です。

## 構成

| 場所 | 内容 |
| --- | --- |
| `sumai-otasuke-station/` | WordPressテーマ本体（PHP、CSS、JavaScript、画像） |
| `static/` | 静的な表示確認用（HTML、CSS、JavaScript、画像） |
| `ADMIN-GUIDE.md` | WordPress管理画面での変更方法 |
| `IMAGE-LIST.md` | 画像の用途と差し替え先 |
| `PUBLICATION-CHECKLIST.md` | Web公開前の確認事項 |
| `TEST-RESULTS.md` | これまでの確認結果と環境上の制約 |

## ローカルでの表示確認

リポジトリのルートで次を実行し、ブラウザで `http://localhost:8080/` を開きます。

```bash
python3 -m http.server 8080 --directory static
```

`static/` は表示確認用です。デモのお問い合わせフォームは送信されません。WordPress固有の機能や管理画面の設定を確認するときは、WordPress 6.4以上・PHP 7.4以上のローカル環境またはステージング環境に `sumai-otasuke-station/` をテーマとして設置してください。テーマの導入と設定は [テーマの説明](sumai-otasuke-station/README.md) と [管理画面の操作説明](ADMIN-GUIDE.md) を参照してください。PHPがある環境では `find sumai-otasuke-station -name '*.php' -print0 | xargs -0 -n1 php -l` で構文を確認できます。

## 文章・料金・サービス・画像の変更場所

- WordPressの初期表示や固定の文言・構成：`sumai-otasuke-station/front-page.php`。店舗情報、料金、サービス項目など、管理画面から変更できる初期値は `sumai-otasuke-station/inc/customizer.php` にあります。
- WordPressの見た目と動き：`sumai-otasuke-station/assets/css/style.css` と `sumai-otasuke-station/assets/js/main.js`。
- テーマに同梱する画像：`sumai-otasuke-station/assets/images/`。管理画面から選んだ画像はWordPress側のメディアライブラリに保存されます。
- 静的プレビューの文章・料金・サービス：`static/index.html`。静的プレビューの見た目・動き・画像は `static/assets/` にあります。テーマと静的版は別ファイルなので、両方に反映したい変更はそれぞれ更新してください。
- 管理画面での編集：コピー、店舗情報、料金、画像、お知らせ、事例、FAQなどは [操作説明](ADMIN-GUIDE.md) を参照してください。

WordPressの投稿、メディアライブラリ、カスタマイザーの保存値、プラグイン設定はWordPressのデータベースやアップロード領域にあり、このリポジトリには含まれません。別環境で同じ管理画面の内容まで再現するときは、WordPress側で別途バックアップ・移行が必要です。認証情報や顧客情報をGitに追加しないでください。

## GitHubへ変更を保存する

変更後に表示を確認し、リポジトリのルートで次を実行します。

```bash
git status
git add README.md .gitignore ADMIN-GUIDE.md IMAGE-LIST.md PUBLICATION-CHECKLIST.md TEST-RESULTS.md static/ sumai-otasuke-station/
git commit -m "ホームページを更新"
git push origin main
```

追加ファイルがある場合は `git status` で内容を確認してから個別に `git add` してください。配布用の `sumai-otasuke-station.zip` はテーマフォルダから作り直せるため、Gitの対象外です。必要な場合はリポジトリのルートで `zip -qr sumai-otasuke-station.zip sumai-otasuke-station/` を実行します。

GitHubへプッシュしてもWordPressサイトは自動更新されません。Web公開や本番テーマの更新は、公開先と手順を確認してから別途行います。GitHub PagesではWordPressのPHPや管理画面は動作しません。
