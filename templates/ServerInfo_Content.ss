<div id="serverinfo-cms-content" class="cms-content center cms-tabset $BaseCSSClasses" data-layout-type="border" data-pjax-fragment="Content">

	<div class="cms-content-header north">
		<% with $EditForm %>
			<div class="cms-content-header-info">
				<% include BackLink_Button %>
				<% with $Controller %>
					<% include CMSBreadcrumbs %>
				<% end_with %>
			</div>
		<% end_with %>
	</div>

	<div class="cms-content-fields center ui-widget-content" data-layout-type="border">


		<fieldset class="field">
			<div class="cms-panel-padded">
				<h2>Server information</h2>
                <iframe src="/admin/serverinfo/getinfo" width="100%" height="30000px"></iframe>
            </div>
		</fieldset>



	</div>

</div>
