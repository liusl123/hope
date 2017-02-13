@extends('layout.grzx')

@section('con')
<article class="content">

<dl>
    <dt class="module-title">个人资料</dt>
    <dd class="module-item">
        <input value="" class="province" type="hidden">
        <input value="" class="city" type="hidden">
        <input value="" class="area" type="hidden">
        <form class="information-form"  novalidate="novalidate" action="/login/bcgrzl" method="post">
        {{csrf_field()}}
        <table class="form-table">
            <colgroup>
                <col style="width: 150px;">
                <col>
            </colgroup>
            <tbody>
<!--             <tr>
                <th>当前头像：</th>
                <td>
                    <img src="/grzxgrzl/big">
                </td>
            </tr> -->
            <tr>
                <th><span class="red">*</span>姓名：</th>
                <td><input class="user-name" placeholder="方便核对您的本人信息，不会对外公开" value="" name="realName" type="text"></td>
            </tr>
            <tr>
                <th><span class="red">*</span>性别：</th>
                <td class="sex-box">
                    <label><input name="sex" checked="checked" value="1" type="radio">男</label>
                    <label><input name="sex" value="0" type="radio">女</label>
                </td>
            </tr>
<!--             <tr>
                <th><span class="red">*</span>生日：</th>
                <td>
                    <select id="dayType" name="typeCheck" aria-invalid="false" class="valid"><option value="-1">请选择</option><option value="0">公历</option><option value="1">农历</option></select>
                    <select id="year" style="display: inline-block;"><option value="1900">1900年</option><option value="1901">1901年</option><option value="1902">1902年</option><option value="1903">1903年</option><option value="1904">1904年</option><option value="1905">1905年</option><option value="1906">1906年</option><option value="1907">1907年</option><option value="1908">1908年</option><option value="1909">1909年</option><option value="1910">1910年</option><option value="1911">1911年</option><option value="1912">1912年</option><option value="1913">1913年</option><option value="1914">1914年</option><option value="1915">1915年</option><option value="1916">1916年</option><option value="1917">1917年</option><option value="1918">1918年</option><option value="1919">1919年</option><option value="1920">1920年</option><option value="1921">1921年</option><option value="1922">1922年</option><option value="1923">1923年</option><option value="1924">1924年</option><option value="1925">1925年</option><option value="1926">1926年</option><option value="1927">1927年</option><option value="1928">1928年</option><option value="1929">1929年</option><option value="1930">1930年</option><option value="1931">1931年</option><option value="1932">1932年</option><option value="1933">1933年</option><option value="1934">1934年</option><option value="1935">1935年</option><option value="1936">1936年</option><option value="1937">1937年</option><option value="1938">1938年</option><option value="1939">1939年</option><option value="1940">1940年</option><option value="1941">1941年</option><option value="1942">1942年</option><option value="1943">1943年</option><option value="1944">1944年</option><option value="1945">1945年</option><option value="1946">1946年</option><option value="1947">1947年</option><option value="1948">1948年</option><option value="1949">1949年</option><option value="1950">1950年</option><option value="1951">1951年</option><option value="1952">1952年</option><option value="1953">1953年</option><option value="1954">1954年</option><option value="1955">1955年</option><option value="1956">1956年</option><option value="1957">1957年</option><option value="1958">1958年</option><option value="1959">1959年</option><option value="1960">1960年</option><option value="1961">1961年</option><option value="1962">1962年</option><option value="1963">1963年</option><option value="1964">1964年</option><option value="1965">1965年</option><option value="1966">1966年</option><option value="1967">1967年</option><option value="1968">1968年</option><option value="1969">1969年</option><option value="1970">1970年</option><option value="1971">1971年</option><option value="1972">1972年</option><option value="1973">1973年</option><option value="1974">1974年</option><option value="1975">1975年</option><option value="1976">1976年</option><option value="1977">1977年</option><option value="1978">1978年</option><option value="1979">1979年</option><option value="1980">1980年</option><option value="1981">1981年</option><option value="1982">1982年</option><option value="1983">1983年</option><option value="1984">1984年</option><option value="1985">1985年</option><option value="1986">1986年</option><option value="1987">1987年</option><option value="1988">1988年</option><option value="1989">1989年</option><option value="1990">1990年</option><option value="1991">1991年</option><option value="1992">1992年</option><option value="1993">1993年</option><option value="1994">1994年</option><option value="1995">1995年</option><option value="1996">1996年</option><option value="1997">1997年</option><option value="1998">1998年</option><option value="1999">1999年</option><option value="2000">2000年</option><option value="2001">2001年</option><option value="2002">2002年</option><option value="2003">2003年</option><option value="2004">2004年</option><option value="2005">2005年</option><option value="2006">2006年</option><option value="2007">2007年</option><option value="2008">2008年</option><option value="2009">2009年</option><option value="2010">2010年</option><option value="2011">2011年</option><option value="2012">2012年</option><option value="2013">2013年</option><option value="2014">2014年</option><option value="2015">2015年</option><option value="2016">2016年</option><option value="2017">2017年</option><option value="2018">2018年</option><option value="2019">2019年</option><option value="2020">2020年</option><option value="2021">2021年</option><option value="2022">2022年</option><option value="2023">2023年</option><option value="2024">2024年</option><option value="2025">2025年</option><option value="2026">2026年</option><option value="2027">2027年</option><option value="2028">2028年</option><option value="2029">2029年</option><option value="2030">2030年</option><option value="2031">2031年</option><option value="2032">2032年</option><option value="2033">2033年</option><option value="2034">2034年</option><option value="2035">2035年</option><option value="2036">2036年</option><option value="2037">2037年</option><option value="2038">2038年</option><option value="2039">2039年</option><option value="2040">2040年</option><option value="2041">2041年</option><option value="2042">2042年</option><option value="2043">2043年</option><option value="2044">2044年</option><option value="2045">2045年</option><option value="2046">2046年</option><option value="2047">2047年</option><option value="2048">2048年</option><option value="2049">2049年</option><option value="2050">2050年</option><option value="2051">2051年</option><option value="2052">2052年</option><option value="2053">2053年</option><option value="2054">2054年</option><option value="2055">2055年</option><option value="2056">2056年</option><option value="2057">2057年</option><option value="2058">2058年</option><option value="2059">2059年</option><option value="2060">2060年</option><option value="2061">2061年</option><option value="2062">2062年</option><option value="2063">2063年</option><option value="2064">2064年</option><option value="2065">2065年</option><option value="2066">2066年</option><option value="2067">2067年</option><option value="2068">2068年</option><option value="2069">2069年</option><option value="2070">2070年</option><option value="2071">2071年</option><option value="2072">2072年</option><option value="2073">2073年</option><option value="2074">2074年</option><option value="2075">2075年</option><option value="2076">2076年</option><option value="2077">2077年</option><option value="2078">2078年</option><option value="2079">2079年</option><option value="2080">2080年</option><option value="2081">2081年</option><option value="2082">2082年</option><option value="2083">2083年</option><option value="2084">2084年</option><option value="2085">2085年</option><option value="2086">2086年</option><option value="2087">2087年</option><option value="2088">2088年</option><option value="2089">2089年</option><option value="2090">2090年</option><option value="2091">2091年</option><option value="2092">2092年</option><option value="2093">2093年</option><option value="2094">2094年</option><option value="2095">2095年</option><option value="2096">2096年</option><option value="2097">2097年</option><option value="2098">2098年</option><option value="2099">2099年</option><option value="2100">2100年</option></select>
                    <select id="month" style="display: inline-block;" aria-invalid="false" class="valid"><option value="1">正月</option><option value="2">二月</option><option value="3">三月</option><option value="4">四月</option><option value="5">五月</option><option value="17">闰五月</option><option value="6">六月</option><option value="7">七月</option><option value="8">八月</option><option value="9">九月</option><option value="10">十月</option><option value="11">冬月</option><option value="12">腊月</option></select>
                    <select id="day" style="display: inline-block;"><option value="1">初一</option><option value="2">初二</option><option value="3">初三</option><option value="4">初四</option><option value="5">初五</option><option value="6">初六</option><option value="7">初七</option><option value="8">初八</option><option value="9">初九</option><option value="10">初十</option><option value="11">十一</option><option value="12">十二</option><option value="13">十三</option><option value="14">十四</option><option value="15">十五</option><option value="16">十六</option><option value="17">十七</option><option value="18">十八</option><option value="19">十九</option><option value="20">二十</option><option value="21">廿一</option><option value="22">廿二</option><option value="23">廿三</option><option value="24">廿四</option><option value="25">廿五</option><option value="26">廿六</option><option value="27">廿七</option><option value="28">廿八</option><option value="29">廿九</option><option value="30">三十</option></select>
                    <input name="birthdayType" type="hidden">
                    <input name="birthday" type="hidden">
                </td>
            </tr> -->

            <tr>
                <th><span class="red">*</span>居住地：</th>
                <td id="j_ReginContriner">
                    <!--层级联动选择框-->
                    <select id="loc_province" name="sheng" style="width:80px;"></select>
                    <select id="loc_city" name="shi"  style="width:100px;"></select>
                    <select id="loc_town" name="xian" style="width:120px;"></select>
                </td>
            </tr>
            <tr>
                <th></th>
                <!-- <td><button class="btn-blue submit btn-submit" type="submit">保存</button></td> -->
                <td><input type="submit" value="保存" class="btn-blue submit btn-submit" ></td>
            </tr>
            </tbody>
        </table>
        </form>
      

    </dd>
</dl>

    </article>

@endsection
