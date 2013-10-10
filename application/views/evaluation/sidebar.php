<div class="span3">
	<div class="sidebar">
		<ul>
			<li {% if not active_nav or active_nav == 'DASHBOARD' %} class="active" {% endif %} >
				<a href="{% url 'classes:dashboard' %}">
					<div class="sidebar-icon fui-cmd"></div>
					<div class="sidebar-content">WORK COMPETENCY</div>
				</a>
			</li>

			<li {% if active_nav == 'CLASSES' %} class="active" {% endif %} >
				<a href="{% url 'classes:classes' %}">
					<div class="sidebar-icon fui-lock"></div>
					<div class="sidebar-content">BEHAVIORAL COMPETENCY</div>
				</a>
			</li>

			<li {% if active_nav == 'EXAMS' %} class="active" {% endif %} >
				<a href="{% url 'essays:list' %}">
					<div class="sidebar-icon fui-location"></div>
					<div class="sidebar-content">COMMENTS *</div>
				</a>
			</li>
		</ul>
	</div>
</div>