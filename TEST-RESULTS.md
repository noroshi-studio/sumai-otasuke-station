# 実装・テスト結果

実施日: 2026-08-27

追記: 2026-08-28に電話番号、正式住所、Googleマップ埋め込み・外部リンク・構造化データを更新。

## 静的版

- Google Chrome Headlessで1440×1200、1440×12000、390×844を撮影して目視確認
- デザイン参考画像反映後、1440×1100、390×1100でヒーローの重なり、可読性、モバイルトリミングを再確認
- PCとスマートフォンの主要セクション、固定CTA、見出し、カード、フォームを確認
- DOM計測で390px時のdocument/body幅が390px、主要コンテンツ幅が358pxで横スクロールなし
- 全ローカル画像・CSS・JavaScriptのHTTP 200をサーバーログで確認
- HTML内の55参照を走査し、ローカルファイル欠落0件、存在しないページ内アンカー0件
- ChromeログにJavaScriptの構文／実行エラーなし
- Intersection Observer、カウントアップ、タブ、メニュー、スクロール進捗、reduced-motion分岐を実装
- `theme.json` はJSON構文検証済み

## WordPressテーマ

- 必須テンプレート、テーマヘッダー、CPT、Customizer、SEO出力、フォールバックを目視・静的確認
- PHPファイル15点の開始／終了タグ整合を機械確認
- エスケープ、サニタイズ、権限に沿ったCustomizer設定、WordPress標準API利用を確認
- テーマは独自メール送信処理を持たず、ショートコード未設定時は代替案内を表示
- LocalBusinessは未設定の住所詳細・電話・営業時間を出力しない設計
- WordPress標準XMLサイトマップを変更しない設計

## 環境上未実施

- この制作環境にはPHP実行バイナリとWordPress本体がないため、`php -l` と実WordPress上の画面確認は未実施です。本番投入前にステージング環境で実行してください。
- Lighthouse CLIはNode.jsがないため未実施です。外部フォント／大型ライブラリなし、画像寸法、遅延読み込み、reduced-motion、フォーカス表示などは実装済みです。

## ステージングでの最終コマンド例

```bash
find wp-content/themes/sumai-otasuke-station -name '*.php' -print0 | xargs -0 -n1 php -l
```

続けて、Chrome Lighthouse、構造化データ検証、フォーム送受信、SNSシェア、実機表示を確認してください。
