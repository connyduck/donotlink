<div class="faq">
<p>
   Whenever you link a website, its position in search engines is strengthened. Sometimes you want to post a link to a website without improving its rank. This is where <?php echo SITE_NAME; ?> comes in.
</p>
<h2>What does <?php echo SITE_NAME; ?> do?</h2>
<p>
   Using <?php echo SITE_NAME; ?> instead of linking to questionable websites directly will prevent your links from <strong>improving these websites' position in search engines.</strong> Additionally <?php echo SITE_NAME; ?> will remove the <a href="https://en.wikipedia.org/wiki/HTTP_referer">referer</a>, so the linked website will not know where its visitors are coming from.
</p>

<h2>How does it work?</h2>
<ul>
   <li>This url is blocked in our <a href="https://en.wikipedia.org/wiki/Robots_exclusion_standard">robots.txt</a> file, so (search engine) robots are discouraged from crawling it.</li>
   <li>The "<a href="https://en.wikipedia.org/wiki/Nofollow">nofollow</a>" attribute of the link and the intermediate page give robots another reminder to not crawl the link.</li>
   <li>If a known robot does decide to crawl the link, our code will identify it and serve it a blank page (403 Forbidden) instead of redirecting to the url.</li>
   <li>Redirects are implemented via JavaScript and not via http response status codes so the browser will remove the <a href="https://en.wikipedia.org/wiki/HTTP_referer">referer</a> from the request.</li>
</ul>

<p>
   To use <?php echo SITE_NAME; ?> either copy and paste the link in the form above or prepend <strong><?php echo SERVER_NAME; ?>/</strong> like this <strong><?php echo SERVER_NAME; ?>/http://example.com</strong>. A link always needs to start with <strong>http://</strong> or <strong>https://</strong>.
</p>

<h2>What does <?php echo SITE_NAME; ?> not do?</h2>
<ul>
   <li><?php echo SITE_NAME; ?> does not use cookies or any other technology to track its users.</li>
   <li><?php echo SITE_NAME; ?> does not scan the linked site for malware.</li>
   <li><?php echo SITE_NAME; ?> does not prevent the linked site from getting ad revenue from visitors.</li>
</ul>
<p class="credit"> created by <a href="https://twitter.com/connyduck">@ConnyDuck</a></p>
<p class="patreon"><a href="https://www.patreon.com/connyduck">Support on Patreon </a></p>
<p class="github"><a href="https://github.com/connyduck/donotlink">Get the source code on Github</a></p>
</div>
