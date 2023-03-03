<?php

namespace Tests\Feature\Contents;

use DonatelloZa\RakePlus\RakePlus;
use Tests\TestCase;

class ContentTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_extraction_keyword_in_content(): void
    {
        $content = "
        김백일 소장 (중장 추서)

간도특설대 창설 인원으로 만주군 상위(대위)까지 올라서 일제에게 훈장까지 수여받음.

한국군 복무 당시에도 군수 물자를 빼돌려 자신의 결혼식을 사치스럽게 치르다가 해임당한 전력도 있음.

그러나 한국전쟁의 전초전 격인 옹진 - 은파산 전투에서 북한군에게 빼앗긴 영토 대부분을 탈환함.

한국전쟁 당시에도 안강 - 기계 전투에서 북한군 제2군단을 저지해서 낙동강 방어선 사수에 크게 기여함.

특히 흥남 철수작전 당시 미군 제10군단장인 에드워드 아놀드가 선박에 피란민 탑승을 거부하자 '국군 모두 강원도로 걸어서 퇴각할테니 피란민들은 태워달라!'고 강경히 요구했는데...

당시 원산을 북한군에게 빼앗긴 상태였으므로 이는 '북한 - 중공군에게 포위당해 옥쇄하겠다!'는 말이었고, 결국 피란민 탑승을 허가받아 10만 명의 피란민들을 구할 수 있었음.

1951년 3월 28일, 제8군사령부에서 회의를 마치고 '급박한 전시에 군단 지휘부를 오래 비워둘 수 없다.'며 악천후에도 비행기로 신속히 복귀하려다가 비행기 엔진 고장으로 추락사함.


친일파 + 군수 물자 횡령범 + 유능하고 책임감 있는 군 지휘관 + 피란민 10만 명의 목숨을 구한 영웅이라는 매우 상반된 모습이 공존함.
        ";
        $phrase = RakePlus::create($content, 'ko', 2, true)->keywords();
        dump($phrase);
        $expected = [
            0 => "김백일 소장",
            1 => "중장 추서",
            2 => "간도특설대 창설 인원으로 만주군 상위",
            3 => "대위",
            4 => "까지 올라서 일제에게 훈장까지 수여받음",
            5 => "한국군 복무 당시에도 군수 물자를 빼돌려 자신의 결혼식을 사치스럽게 치르다가 해임당한 전력도 있음",
            6 => "그러나 한국전쟁의 전초전 격인 옹진 - 은파산 전투에서 북한군에게 빼앗긴 영토 대부분을 탈환함",
            7 => "한국전쟁 당시에도 안강 - 기계 전투에서 북한군 제2군단을 저지해서 낙동강 방어선 사수에 크게 기여함",
            8 => "특히 흥남 철수작전 당시 미군 제10군단장인 에드워드 아놀드가 선박에 피란민 탑승을 거부하자 '국군 모두 강원도로 걸어서 퇴각할테니 피란민들은 태워달라",
            9 => "'고 강경히 요구했는데",
            10 => "당시 원산을 북한군에게 빼앗긴 상태였으므로 이는 '북한 - 중공군에게 포위당해 옥쇄하겠다",
            11 => "'는 말이었고",
            12 => "결국 피란민 탑승을 허가받아 10만 명의 피란민들을 구할 수 있었음",
            13 => "1951년 3월 28일",
            14 => "제8군사령부에서 회의를 마치고 '급박한 전시에 군단 지휘부를 오래 비워둘 수 없다",
            15 => "'며 악천후에도 비행기로 신속히 복귀하려다가 비행기 엔진 고장으로 추락사함",
            16 => "친일파 + 군수 물자 횡령범 + 유능하고 책임감 있는 군 지휘관 + 피란민 10만 명의 목숨을 구한 영웅이라는 매우 상반된 모습이 공존함",
        ];
        $this->assertEquals($expected, $phrase);
    }

    public function test_extraction_keyword_in_content2(): void {
        $content = "
        김백일 소장 (중장 추서)

간도특설대 창설 인원으로 만주군 상위(대위)까지 올라서 일제에게 훈장까지 수여받음.

한국군 복무 당시에도 군수 물자를 빼돌려 자신의 결혼식을 사치스럽게 치르다가 해임당한 전력도 있음.

그러나 한국전쟁의 전초전 격인 옹진 - 은파산 전투에서 북한군에게 빼앗긴 영토 대부분을 탈환함.

한국전쟁 당시에도 안강 - 기계 전투에서 북한군 제2군단을 저지해서 낙동강 방어선 사수에 크게 기여함.

특히 흥남 철수작전 당시 미군 제10군단장인 에드워드 아놀드가 선박에 피란민 탑승을 거부하자 '국군 모두 강원도로 걸어서 퇴각할테니 피란민들은 태워달라!'고 강경히 요구했는데...

당시 원산을 북한군에게 빼앗긴 상태였으므로 이는 '북한 - 중공군에게 포위당해 옥쇄하겠다!'는 말이었고, 결국 피란민 탑승을 허가받아 10만 명의 피란민들을 구할 수 있었음.

1951년 3월 28일, 제8군사령부에서 회의를 마치고 '급박한 전시에 군단 지휘부를 오래 비워둘 수 없다.'며 악천후에도 비행기로 신속히 복귀하려다가 비행기 엔진 고장으로 추락사함.


친일파 + 군수 물자 횡령범 + 유능하고 책임감 있는 군 지휘관 + 피란민 10만 명의 목숨을 구한 영웅이라는 매우 상반된 모습이 공존함.
        ";
        $result = $this->extract_news_keywords($content);
        dump($result);
    }

    function extract_news_keywords($content)
    {
        // Load the list of stop words
        $stop_words = file_get_contents(storage_path('/app/public/lang/ko.json'));
        $stop_words = explode("\n", $stop_words);

        // Convert the content to lowercase
        $content = strtolower($content);

        // Remove any non-word characters and replace them with spaces
        $content = preg_replace('/[^\w]+/', ' ', $content);

        // Split the content into an array of words
        $words = explode(' ', $content);

        // Remove the stop words from the list of words
        $keywords = array_diff($words, $stop_words);

        // Count the frequency of each keyword
        $keyword_counts = array_count_values($keywords);

        // Sort the keywords by frequency in descending order
        arsort($keyword_counts);

        // Return the top 5 keywords
        $top_keywords = array_slice(array_keys($keyword_counts), 0, 5);

        return $top_keywords;
    }

}
