(function($) {
	$.datepicker.regional['ru'] = {
		closeText: '�������',
	prevText: '<����',
	nextText: '����>',
	currentText: '�������',
	timeText: '�����',
	hourText: '����',
	minuteText: '������',
	secondText: '�������',
	monthNames: ['������','�������','����','������','���','����',
	'����','������','��������','�������','������','�������'],
	monthNamesShort: ['���','���','���','���','���','���',
	'���','���','���','���','���','���'],
	dayNames: ['�����������','�����������','�������','�����','�������','�������','�������'],
	dayNamesShort: ['���','���','���','���','���','���','���'],
	dayNamesMin: ['��','��','��','��','��','��','��'],
	weekHeader: '��',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''
	};
	$.datepicker.setDefaults($.datepicker.regional['ru']);
})(jQuery);