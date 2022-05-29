

{if $msgs->isError()}
<pre><code>
        <ul>
            {foreach $msgs->getMessages() as $err}
                {strip}
                    <li>{$err->text}</li>
                {/strip}
            {/foreach}
        </ul>
</code></pre>
{/if}
{if $msgs->isInfo()}
<pre><code>
        <ul>
            {foreach $msgs->getMessages() as $inf}
                {strip}
                    <li>{$inf->text}</li>
                {/strip}
            {/foreach}
        </ul>
</code></pre>
{/if}

