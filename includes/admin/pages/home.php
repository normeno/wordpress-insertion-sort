<div class="insertion-sort wrapper">
    <div class="logo">
        <img src="{LOGO}" />
    </div>

    <form id="insertion-sort-admin-form" name="insertion-sort-admin-form" method="POST">

        <section id="head">
            <fieldset>
                <legend><h1>HEAD</h1></legend>

                <h3>JS</h3>
                <small class="hint">Only add code, don't add &lt;script&gt;&lt;/script&gt; tags</small>

                <div class="code-container">
                    <div class="editor">
                        <textarea name="insertion-sort-head-js" id="insertion-sort-head-js">{head-js-data}</textarea>
                    </div>

                    <div class="preview">
                        <pre><code id="insertion-sort-head-js-preview" class="js">{head-js-data}</code></pre>
                    </div>
                </div>


                <h3>CSS</h3>
                <small class="hint">Only add code, don't add &lt;style&gt;&lt;/style&gt; tags</small>
                <div class="code-container">
                    <div class="editor">
                        <textarea name="insertion-sort-head-css" id="insertion-sort-head-css">{head-css-data}</textarea>
                    </div>

                    <div class="preview">
                        <pre><code id="insertion-sort-head-css-preview" class="css">{head-css-data}</code></pre>
                    </div>
                </div>
            </fieldset>
        </section>

        <section id="footer">
            <fieldset>
                <legend><h1>FOOTER</h1></legend>

                <h3>JS</h3>
                <small class="hint">Only add code, don't add &lt;script&gt;&lt;/script&gt; tags</small>
                <div class="code-container">
                    <div class="editor">
                        <textarea name="insertion-sort-footer-js" id="insertion-sort-footer-js">{footer-js-data}</textarea>
                    </div>

                    <div class="preview">
                        <pre><code id="insertion-sort-footer-js-preview" class="js">{footer-js-data}</code></pre>
                    </div>
                </div>


                <h3>CSS</h3>
                <small class="hint">Only add code, don't add &lt;style&gt;&lt;/style&gt; tags</small>
                <div class="code-container">
                    <div class="editor">
                        <textarea name="insertion-sort-footer-css" id="insertion-sort-footer-css">{footer-css-data}</textarea>
                    </div>

                    <div class="preview">
                        <pre><code id="insertion-sort-footer-css-preview" class="css">{footer-css-data}</code></pre>
                    </div>
                </div>
            </fieldset>
        </section>

        <div class="submit">
            <button type="submit" form="insertion-sort-admin-form" value="Save">Save</button>
        </div>
    </form>
</div>