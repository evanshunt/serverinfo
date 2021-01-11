<div id="backuprestore-cms-content" class="flexbox-area-grow fill-height cms-content cms-tabset $BaseCSSClasses" data-layout-type="border" data-pjax-fragment="Content">

    <div class="cms-content-header vertical-align-items">
        <% with $EditForm %>
            <div class="cms-content-header-info vertical-align-items">
                <% include SilverStripe\\Admin\\BackLink_Button %>
                <% with $Controller %>
                    <% include SilverStripe\\Admin\\CMSBreadcrumbs %>
                <% end_with %>
            </div>
        <% end_with %>
    </div>

    <div class="flexbox-area-grow cms-content-fields ui-widget-content cms-panel-padded" data-layout-type="border">

        <div class="panel panel--padded panel--scrollable flexbox-area-grow fill-height flexbox-display cms-content-view">

            <div class="cms-panel-padded">
                <h2>Server information</h2>
                <iframe src="/admin/serverinfo/getinfo" width="100%" height="30000px" frameBorder="0"></iframe>
            </div>

        </div>
    </div>
</div>
