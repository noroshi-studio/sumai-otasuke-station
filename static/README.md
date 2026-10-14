# 静的確認版

`index.html` をブラウザで直接開くか、このディレクトリでローカルサーバーを起動して確認できます。

```bash
python3 -m http.server 8080 --directory static
```

確認URL: `http://localhost:8080/`

## 画像差し替え

`assets/images/` 内のSVGは、写真が未提供の間だけ使用する自作プレースホルダーです。用途が分かるファイル名にしてあります。写真受領後は、同じ縦横比でWebPへ書き出し、HTMLの拡張子を変更してください。

- `hero-community-v2.jpg`: ファーストビュー用のオリジナル街並みイラスト
- `hero-station.svg`: 旧ファーストビュー用プレースホルダー（予備）
- `space-interior.svg`: スペース内観
- `community.svg`: 店舗コンセプト
- `service-*.svg`: 便利屋サービス
- `case-handyman-*.svg`: 便利屋事例
- `case-space-*.svg`: スペース事例
- `ogp.svg`: SNSシェア画像（公開時は1200×630pxのWebP/JPEG推奨）

## 注意

- 問い合わせフォームはデモであり、送信されません。
- 電話番号とGoogleマップは設定済みです。LINEは情報未提供のため無効表示です。
- 公開前にルートの `PUBLICATION-CHECKLIST.md` を確認してください。
