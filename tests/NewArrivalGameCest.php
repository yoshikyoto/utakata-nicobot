<?php
class NewArrivalGameCest
{
    /**
     * @param AcceptanceTester $I
     *
     * MEMO dontSee 今のページにそれが見つからない
     */
    public function getAndCommentOneOfNewArrivalVideo(AcceptanceTester $I) {
        // 総合トップを開く
        // amOnPage はそのページに移動する
        // PHPBrowserの操作は下記URLを見ると良い
        // @see https://codeception.com/docs/modules/PhpBrowser
        $I->amOnPage('/');

        // makeHtmlSnapshot すると、HTMLが tests/_output/debug 以下に置かれる
        $I->makeHtmlSnapshot();

        $I->click('ログイン');
        $I->seeInCurrentUrl('/login');
        $I->fillField('mail_tel', $I->email());
        $I->fillField('password', $I->password());
        $I->click('#login__submit');

        // ログイン成功するとトップページに戻ってくる
        $I->seeCurrentUrlEquals('');


        // 動画トップに移動
        // ヘッダーにある「動画」をクリックして移動するはず
        $I->click('動画');
        $I->makeHtmlSnapshot();

        // 移動後のページが正しいことを確認
        // ?headerまで無いと落ちる
        $I->seeCurrentUrlEquals('/video_top?header');

        // 各要素が存在するかを確認
        $I->see('おすすめの動画');
        // 動画が存在していることを確認
        $I->seeElement(['css' => '.RecommendAreaContainer .VideoCard']);

        $I->see('視聴履歴');
        $I->seeElement(['css' => '.ViewHistoriesContainer .VideoCard']);
        // $I->see('ログインすると視聴した動画の履歴が表示されます。');

        $I->see('おすすめのタグ');
        $I->seeElement(['css' => '.RecommendTagsContainer .TagWithVideoItem']);

        $I->see('トレンドタグ');
        $I->seeElement(['css' => '.TrendTagsContainer .TagWithVideoItem']);

        $I->see('ランキング');
        $I->seeElement(['css' => '.RankingVideosContainer .VideoCard']);

        $I->see('ニコニ広告');
        $I->seeElement(['css' => '.NicoadVideosContainer .NicoadVideoItem']);

        $I->see('新着動画');
        $I->seeElement(['css' => '.NewArrivalVideosContainer .VideoCard']);

        $I->see('お知らせ');
        $I->see('メンテナンス・障害情報');

        // 「ゲーム」ジャンルのページに移動
        // ジャンル一覧の中から「ゲーム」をクリックして移動するはず
        $I->click('ゲーム');
        $I->makeHtmlSnapshot();

        // 各ジャンルのページに行くと、ジャンルの表示がある
        $I->see('ジャンル');

        // ジャンルのタグ一覧がある
        $I->seeElement(['css' => '.RepresentedTag']);

        // このセクションは各ジャンルにしか無いようだ（「全て」にはない）
        $I->see('新着コメント動画');
        $I->seeElement(['css' => '.NewCommentVideosContainer .VideoCard']);

        $I->see('注目のタグ');
        $I->seeElement(['css' => '.TrendyTagAreaContainer .TagItem']);

        $I->see('新着投稿動画');
        $I->seeElement(['css' => '.NewArrivalVideosContainer .VideoCard']);

        $I->see('ランキング');
        $I->seeElement(['css' => '.RankingVideosContainer .VideoCard']);

        // 「注目のタグの動画」には、タグ、タグの説明、動画いくつか、が出ている
        $I->see('注目のタグの動画');
        $I->seeElement(['css' => '.TrendyTagsWithVideosContainer .TagItem']);
        $I->seeElement(['css' => '.TrendyTagsWithVideosContainer .TrendyTagsWithVideosContainer-description']);
        $I->seeElement(['css' => '.TrendyTagsWithVideosContainer .TrendyTagsWithVideosContainer-videos .VideoCard']);

        // 新着度投稿動画をもっと見る
        $I->click('新着投稿動画');
        // TODO ここなぜかエラーが出る
        // $I->seeCurrentUrlEquals(urlencode('/search/ゲーム?genre=game&sort=f&order=d&ref=videocate_newarrival'));
    }
}