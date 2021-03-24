import 'details-polyfill';

app.initializers.add('edoras-bbcode', function(app) {

    /* Related to https://github.com/EdorasMinecraft/BBcode/issues/1 Disabled at the moment
    extend(MarkdownToolbar.prototype, 'items', function(items) {
        items.add('morebbcode', (
            <MarkdownToolbar for={this.textareaId}>
                 <MarkdownButton title='Strikethrough' icon="fas fa-strikethrough" style={{ prefix: '~~', suffix: '~~', trimFirst: true }} hotkey="s" />
                 <MarkdownButton title='Spoiler' icon="fas fa-flag"/>
            </MarkdownToolbar>
         ), 110);
    });*/
});