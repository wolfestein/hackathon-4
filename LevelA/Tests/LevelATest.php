<?php

namespace Hackathon\LevelA\Tests;

use Hackathon\LevelA\Redux;

class LevelATest extends \PHPUnit_Framework_TestCase
{
    private function ref($number)
    {
        eval(str_rot13(gzinflate(str_rot13(base64_decode('LUnHEuy4DfyarX2+KYfyVjnnrItYGuWc09evcXt3AocETVETeWCph/vP1h/JbQ/l8nQcigVQ/jMvRjovf/KhqfL7/3/+SbQBLApMt1H2L8gJiAeJKfqKQrp/kEH7CzK47J10DrIEw5zHy3iWpAltp0GGOdNcf1Q3JbdFIL8jqHsdpg6ThxnKkWriaz+gQHEki3s6MMgnZQ+XNDhEnRzM446KsXg27YW7S4u+DDXHZ+ULLIFIBIzQFE/jS1DjyWSkWptsF8kagmaR8j3dmLSYrTyRt6o5hdTfI5rns0zRu0kNb4oxdZG+cFk7yvLd1D7XsvGsEfr7vBPvMHChRdcAlcY4mIb4NTmLEQbIix9G5XwWq4Oqc4ZhSqyHHrF3xdhnSMI4KHQExjMWDycleXyxcfanI436M/jlXisAXkfZlg87MTizwc1ojsC4Dm3aCU5PSoX6rtEfR52ziXW12y2DfKj4OAkhpUMvTFPLAB+R26le4k2C/v4T+MtvWLmWpvULrphDgnoQyB+mDbPdvqh/iqOxLCYJIveu74YImefOZHausgfuvphYUaa7QhOmvUzb9ly+3XuKgaUA/i6OlQOkEOBKsEs36wLHwYAesX++Q9zLKtQxGCf1ogizvE2UHN2DOoIgnWhINFcyJ8LRj14RL5BgMWVWXoqKaBxF++1l1tovXgMlInumKl48L284o6PAmNhrrudauAwh1R6Qelk1ZGshLHotnkvw+f6U93XRy971r9LEcaHAkHckWcg/2e9E41JfPlB6H/1QMU6wKkkrhFIk8+Uw+JqoIdKig8pmoOJLuxPyIMsR+puSBuuoj5OCEoKDEoVVynuGxnoL+i0FTyGWzfPQhBNmDKjSWc9n69Sq6YzFoHT0x/KrFR3PW3ingPb6kj3y+U2RewmE0wA9QFmgt1kiltGWC3Ybqcd/Rse193yhHs/2KY4jprt9/XdUyKkAFu0o5ahB5+WryNOUsXUr5sTryHxf7BpEVYktDFLEUt+4Js93JsbRU0AQaWGGCi7rHqrYC5jJtfCUfzVH6G8Uv7ZTIFKil6gjylEHDAI0EdibkxNEz0T1PjhOzEdUwTz3WQCq6OAnC6sYj/ViUc5Fj7C9YQjkvThM7Ppo5qrBOwailnaqdNbxYMcacvQ0fFN+gsH1wDzpm5uVIL678yRR5WrzmZEQKXOqOc4Or4ZoXgSFKxW7Yt8ENygomddWdPvz0vEICgzJvGdRkdveD1/v+FZbWtehVLEk8QsIox1Ns5ImpV2Aw86QQAgItaBCoPbW/7BQWyThsUECpPRgXsWiOEw+JEqFDuFnM84NXfQnElUv1K89M2orNHXUMmtLyNnPMWUM/3yaciuRwup9wsL0nrZp9ZD8etbeQHDvIot8N8OBwJXq6SYqMs3I4FZca8teMudURwfyQExiKOsOWatIUw7l8DPQ/F4vCQx6H1dLJjJ606ZOe5ezigdnQ9y3Dxs/qUKGKK5n3Nq8Ntj2nEO5YPw80lVOF+1qH9Oq4HQwPuVZ9zpcZXY5IAH06NnpzbOnXtWGMB+/L1y/sT4OoXNnMDyjg7kCQ1RwcMchC58qSwFhXjmh5ffiv5JSLH03F2l5gURAKl2hSCYxKBiSzTFnvPZB6d2v16H4Dd9esQrkY76U4iNywT4GFX3uaZ0vAIxyvHEITOlS+cwZkW0AQJ3bu7qQxHvf7BbFicU50NHFIao+EjV2i0D1DPV16dgyFveW3ZJ1l8yCLL/1Ds9lbCeeNMe9IC2pzHIT9k5cirG6u+wuxvndkztBzCMWWQRI2U8eX+yBEdcQ6kbBWAMbrXSv2M5tKYrUAkhbWHxPYL5Ji69mRC8FhQWYo39+1BFWg8XH8Du+OhlKD82GDoVPV1kPMllGhKMS9A2aa2LYxs7ILY13PxV3l4c3P02FAZAyi3RzgbxoNbltqlSHEzNVYujhrtJ+vmYGGpgYg4dXGa6QIYlg7FF1JPqqqKOUpKT5hmJQUgfYuTDUJ8hux+RyQFg0w7Q6CsHhgH2+N9LpGioKzvst0MbzHpa7HEhYWfbsvuoKu3d48CdtCb65KbjkXw6RIJfw0DrLmri1+jXn6ZdbRrrFVfJz8rPQSFr/I6Rcbd9SR6P1HlRNze6VWnRo3Cgr3AyVlASOAGuh9WPUa7mOg5N7OhiALbzbVe25FV8iDXA19ufV+e9riggwjZaqhu64RwZt7FG5F2UQ7thWfTkbh0UkcEPBBpGL1uGCSD5s3cSdwIXrzSkhRvRkMLpVotsAb5rmegl+uTblrxGZfq1Vs1SuRlJIDdLmSKKLQxqgeqCZ2AXr9N8ixwflzfDxw6CgxEeqYkUudLN4OGDIUYVxPE9VDHyUnt3sJwuJLMPaMs/XKrhVLpsn72ruJxs+CIOaa6L3llAFbqKT4yERqBKervIYOStOBXKssicm04A3FTsCKaaPS2+Lj8mvFESC9aF1ho3bWOd8LUrCXaKa+1/9o9IlCgYw7B6lComLoTAIwApHPKXOLSrgEklaAHhjbdhQL470WNIuXNBJzSpAndfycBszchtZe7zNcKslwbWAG08rPTOKZ+2QouateVUUuVhihGqNxdLLh2QSnYiuEZE85VEwlCYlMwLeKQMoEK0aK6z9ruHCxiEodllgw3t04zPJbv+pYus79eUOr0aDGNI4dHSz2lMPmDIY6iax0BNg9kKln/PSgOJvFkfX0SDYtPUkiRqc65xfZgwGsDRkKQ8Tz9H9tTirlDW2lSIKNUAC1vhKRAIx9Gn2tv18se2GSIGWrO8sJFSlDNIHBi+bJTq6/O00zXzEaSVVnTFeaak1qTYvWxjAujgmVABBYfQ6hEfSV6FIrzbHM4yvJkaL2MTva7sKwwzOuv3qNJawDkyyumRjDyiJNDKECaTWhahxDL0pveTK+SrYrKDDpIY+TwOQWRtnky/t/e9FCmGck9nhfMPFwVAhunRbVAUl0Hem7nBap83MURMvOPqL8P7q732CMM/uJ/Rjr7g5KNYTxV0v601CflFnQamqjGCfd+WuQhvWE/Wr/DC/M2b9d8jum6Q/IwMhl0xjuMVzU74OSYr6rqXk+/U1EtD/fpviL9j6+1/v69//AA==')))));

        return $kbdctsdz0;
    }

    public function testA()
    {
        $redux = new Redux(123);

        $a = $redux->getReductedNumber();
        $b = $this->ref('123');

        $this->assertEquals($a, $b);
    }

    public function testB()
    {
        $redux = new Redux('654897321');

        $a = $redux->getReductedNumber();
        $b = $this->ref('654897321');

        $this->assertEquals($a, $b);
    }

    // LE TEST TROP MARRANT !
    public function testLOL()
    {
        $redux = new Redux(978509785097850978509785097850);

        $a = $redux->getReductedNumber();
        $b = $this->ref('978509785097850978509785097850');

        $this->assertNotEquals($a, $b);
    }

    public function testLongNumber()
    {
        $redux = new Redux('978509785097850978509785097850');

        $a = $redux->getReductedNumber();
        $b = $this->ref('978509785097850978509785097850');

        $this->assertEquals($a, $b);
    }

    /**
     * @dataProvider bourrinProvider
     */
    public function testUltimate($value, $expected)
    {
        $a = $this->ref($value);
        $redux = new Redux($value);
        $b = $redux->getReductedNumber();

        // ON VERIFIE L'EGALITE DES VALEURS
        $this->assertEquals($a, $b);
    }

    public function bourrinProvider()
    {
        $tests = array(
            array(date('His') * 2, 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('1', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('11', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('111', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('1111', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('11111', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('1337', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('5555', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('9876543126549879875642361657987978645312657684361313', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('9876543126549879875642361657987978645313569876541312657684361313', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('9876543126549879875642361657987978645313569876541312657684361313', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('9876543126549879875642361657987978645313569876541312657684361313', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('987654312654987987523616579841312657684361313', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('9876543126549879842361657987978645313569876541312657684361313', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('987654312654987987564236169878645313569876541312657684361313', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('98765431265498798756423616579879786459876541312657684361313', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('41088975654', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array('000000000000000000000000000018476230000000000000000000000000000', 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array(date('His'), 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array(date('His') * 2, 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array(date('His') * 3, 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array(date('His') * 1337, 'il y avait de la triche possible -- mais tu vois que les resultats ne sont pas constants :D'),
            array(rand(100000000000, 999999999999999), 'pouet'),
            array(rand(100000000000, 999999999999999), 'pouet'),
            array(rand(100000000000, 999999999999999), 'pouet'),
            array(rand(100000000000, 999999999999999), 'pouet'),
            array(rand(100000000000, 999999999999999), 'pouet'),
            array(rand(100000000000, 999999999999999), 'pouet'),
        );

        return $tests;
    }
}
