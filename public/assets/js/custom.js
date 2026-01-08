//Fade session messages
setTimeout(() => {
    $('.fade-msg').fadeOut();
}, 2000);

//Add Lead Type
$(document).on('click', '.add_lead_type', function() {
    var title = $('.addLeadTypetitle').val();
    if ($('.addLeadTypestatus').is(':checked')) {
        var status = 1;
    } else {
        var status = 0;
    }

    if(title) {
        $('.addLeadTypetitleErr').hide();
        var btn = $(this);
        btn.addClass('loading');
        btn.attr('disabled', true);
        $.ajax({
            url: siteUrl+'/master/lead-type',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data:{title:title, status:status},
            success: function(response) {
                if(response.success == true) {
                    toastr.success(response.message);
                    setTimeout(function() {
                        location.reload();
                    }, 2000)
                } else {
                    toastr.error('Something went wrong.');
                }
            }
        })
    } else {
        $('.addLeadTypetitleErr').show();
    }
});

//Update Lead Type
$(document).on('click', '.edit_lead_type', function() {
    var button = $(this);
    var modal = button.closest('.modal'); // Find the closest modal to the clicked button
    var id = modal.find('.lead-type-id').val();
    var title = modal.find('.editLeadTypetitle').val();
    var status = modal.find('.editLeadTypestatus').is(':checked') ? 1 : 0;

    if(id && title) {
        modal.find('.editLeadTypetitleErr').hide();
        button.addClass('loading');
        button.attr('disabled', true);

        $.ajax({
            url: siteUrl+'/master/lead-type/update/'+id,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: {title: title, status: status},
            success: function(response) {
                button.removeClass('loading');
                button.attr('disabled', false);

                if(response.success == true) {
                    toastr.success(response.message);

                    setTimeout(function() {
                        modal.modal('hide'); // Hide the specific modal
                        location.reload(); // Reload the page after 2 seconds
                    }, 2000); // 2000 milliseconds = 2 seconds
                } else {
                    toastr.error('Something went wrong.');
                }
            },
            error: function() {
                button.removeClass('loading');
                button.attr('disabled', false);
                toastr.error('Something went wrong.');
            }
        });
    } else {
        if (!title) {
            modal.find('.editLeadTypetitleErr').show();
        }
    }
});

//Add Lead Source
$(document).on('click', '.add_lead_source', function() {
    var title = $('.addLeadSourcetitle').val();
    var leadType = $('.addLeadSourceLeadTyp').val();
    if ($('.addLeadSourcestatus').is(':checked')) {
        var status = 1;
    } else {
        var status = 0;
    }

    if(title && leadType) {
        $('.addLeadSourcetitleErr').hide();
        var btn = $(this);
        btn.addClass('loading');
        btn.attr('disabled', true);
        $.ajax({
            url: siteUrl+'/master/lead-source',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data:{title:title, status:status, lead_type:leadType},
            success: function(response) {
                if(response.success == true) {
                    toastr.success(response.message);
                    setTimeout(function() {
                        location.reload();
                    }, 1000)
                } else {
                    toastr.error('Something went wrong.');
                }
            }
        })
    } else {
        if(!title) {
            $('.addLeadSourcetitleErr').show();
        } else {
            $('.addLeadSourcetitleErr').hide();
        }
        if(!leadType) {
            $('.addLeadSourceLeadTypErr').show();
        } else {
            $('.addLeadSourceLeadTypErr').hide();
        }
    }
});

//Update Lead Source
$(document).on('click', '.edit_lead_source', function() {
    var button = $(this);
    var modal = button.closest('.modal'); // Find the closest modal to the clicked button
    var id = modal.find('.lead-source-id').val();
    var title = modal.find('.editLeadSourcetitle').val();
    var leadType = modal.find('.addLeadSourceLeadType').val();
    var status = modal.find('.editLeadSourcestatus').is(':checked') ? 1 : 0;

    if(id && title && leadType) {
        modal.find('.editLeadSourcetitleErr').hide();
        modal.find('.addLeadSourceLeadTypErr').hide();
        button.addClass('loading');
        button.attr('disabled', true);

        $.ajax({
            url: siteUrl+'/master/lead-source/update/'+id,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: {title: title, status: status, lead_type:leadType},
            success: function(response) {
                button.removeClass('loading');
                button.attr('disabled', false);

                if(response.success == true) {
                    toastr.success(response.message);

                    setTimeout(function() {
                        modal.modal('hide'); // Hide the specific modal
                        location.reload(); // Reload the page after 2 seconds
                    }, 2000); // 2000 milliseconds = 2 seconds
                } else {
                    toastr.error('Something went wrong.');
                }
            },
            error: function() {
                button.removeClass('loading');
                button.attr('disabled', false);
                toastr.error('Something went wrong.');
            }
        });
    } else {
        if (!title) {
            modal.find('.editLeadSourcetitleErr').show();
        } else {
            modal.find('.editLeadSourcetitleErr').hide();
        }
        if(!leadType) {
            modal.find('.addLeadSourceLeadTypErr').show();
        } else {
            modal.find('.addLeadSourceLeadTypErr').hide();
        }
    }
});

//Add Event
$(document).on('click', '.add_event', function() {
    var title = $('.addEventTitle').val();
    if ($('.addEventstatus').is(':checked')) {
        var status = 1;
    } else {
        var status = 0;
    }

    if(title) {
        $('.addEventTitleErr').hide();
        var btn = $(this);
        btn.addClass('loading');
        btn.attr('disabled', true);
        $.ajax({
            url: siteUrl+'/master/event',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data:{title:title, status:status},
            success: function(response) {
                if(response.success == true) {
                    toastr.success(response.message);
                    setTimeout(function() {
                        location.reload();
                    }, 1000)
                } else {
                    toastr.error('Something went wrong.');
                }
            }
        })
    } else {
        $('.addEventTitleErr').show();
    }
});

//Update Event
$(document).on('click', '.edit_event', function() {
    var button = $(this);
    var modal = button.closest('.modal'); // Find the closest modal to the clicked button
    var id = modal.find('.event-id').val();
    var title = modal.find('.editEventTitle').val();
    var status = modal.find('.editEventstatus').is(':checked') ? 1 : 0;

    if(id && title) {
        modal.find('.editEventTitleErr').hide();
        button.addClass('loading');
        button.attr('disabled', true);

        $.ajax({
            url: siteUrl+'/master/event/update/'+id,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: {title: title, status: status},
            success: function(response) {
                button.removeClass('loading');
                button.attr('disabled', false);

                if(response.success == true) {
                    toastr.success(response.message);

                    setTimeout(function() {
                        modal.modal('hide'); // Hide the specific modal
                        location.reload(); // Reload the page after 2 seconds
                    }, 2000); // 2000 milliseconds = 2 seconds
                } else {
                    toastr.error('Something went wrong.');
                }
            },
            error: function() {
                button.removeClass('loading');
                button.attr('disabled', false);
                toastr.error('Something went wrong.');
            }
        });
    } else {
        if (!title) {
            modal.find('.editEventTitleErr').show();
        }
    }
});

//Delete using SweetAlert
$('body').on('click', '#show-delete', function() {
    var url = $(this).data("url");
    swal({
            title: 'Are you sure you want to continue?',
            text: "This might erase your records permanently",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "get",
                    url: url,
                    success: function(data) {
                        if(data.success == true) {
                            toastr.success(data.msg);
                            location.reload();
                        } else {
                            toastr.error(data.msg);
                        }
                    }
                });
            }
        });
});

//Append Lead Source using Lead Type
$('.change_lead_type').on('change', function() {
    var leadId = $(this).val();
    if(leadId) {
        $.ajax({
            type:'get',
            url:siteUrl+'/sales-management/get-lead-source',
            data:{lead_id:leadId},
            success: function(data) {
                $('.append_sources').empty();
                var html = "<option value=''>Choose</option>";
                if((data.success == true) && (data.sources.length > 0)) {
                    $.each(data.sources, function(key, value) {
                        html += `<option value="${value.id}">${value.title}</option>`;
                    });
                }
                $('.append_sources').html(html);
            }
        });
    }
});

//Leads form submit
$('#leadsStoreForm').on('submit', function(e) {
    e.preventDefault();
    let formData = $(this).serialize();

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        success: function(response) {
            $('.error').text('');
            if(response.success == true) {
                toastr.success(response.message);
                location.reload();
            } else {
                toastr.error(response.message);
            }
        },
        error: function(response) {
            let errors = response.responseJSON.errors;
            $('#leadTypeError').text(errors.lead_type ? errors.lead_type : '');
            $('#leadSourceError').text(errors.lead_source ? errors.lead_source : '');
            $('#clientNameError').text(errors.client_name ? errors.client_name : '');
            $('#clientPhoneError').text(errors.phone ? errors.phone : '');
            $('#clientEmailError').text(errors.email ? errors.email : '');
            $('#leadRemarkError').text(errors.remark ? errors.remark : '');
            $('#leadStatusError').text(errors.status ? errors.status : '');
            $('#leadDateError').text(errors.lead_date ? errors.lead_date : '');
            $('#eventStartDateError').text(errors.event_start_date ? errors.event_start_date : '');
            $('#eventEndDateError').text(errors.event_end_date ? errors.event_end_date : '');
           // Scroll to the first error message
            let firstErrorElement = $('.error:visible').filter(function() {
                return $(this).text() !== '';
            }).first();

            if (firstErrorElement.length) {
                $('html, body').animate({
                    scrollTop: firstErrorElement.offset().top - 20
                }, 500); // Adjust the offset and duration as needed
            }
        }
    });
});

//Update Lead form date
$('#leadsUpdateForm').on('submit', function(e) {
    e.preventDefault();
    let formData = $(this).serialize();

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        success: function(response) {
            $('.error').text('');
            if(response.success == true) {
                toastr.success(response.message);
                location.reload();
            } else {
                toastr.error(response.message);
            }
        },
        error: function(response) {
            let errors = response.responseJSON.errors;
            $('#leadTypeError').text(errors.lead_type ? errors.lead_type : '');
            $('#leadSourceError').text(errors.lead_source ? errors.lead_source : '');
            $('#clientNameError').text(errors.client_name ? errors.client_name : '');
            $('#clientPhoneError').text(errors.phone ? errors.phone : '');
            $('#clientEmailError').text(errors.email ? errors.email : '');
            $('#leadRemarkError').text(errors.remark ? errors.remark : '');
            $('#leadStatusError').text(errors.status ? errors.status : '');
            $('#leadDateError').text(errors.lead_date ? errors.lead_date : '');
            $('#eventStartDateError').text(errors.event_start_date ? errors.event_start_date : '');
            $('#eventEndDateError').text(errors.event_end_date ? errors.event_end_date : '');
           // Scroll to the first error message
            let firstErrorElement = $('.error:visible').filter(function() {
                return $(this).text() !== '';
            }).first();

            if (firstErrorElement.length) {
                $('html, body').animate({
                    scrollTop: firstErrorElement.offset().top - 20
                }, 500); // Adjust the offset and duration as needed
            }
        }
    });
});

//Append status options on selecting Follow up types
$(document).on('change', '.followType', function() {
    var type = $(this).val();
    $('.appendfollowStatus').empty();
    var html = '<option value="">Select</option>'
    if(type == 'Call') {
        html += '<option value="Busy">Busy</option><option value="Unavailable">Unavailable</option><option value="No Answer">No Answer</option><option value="Wrong Number">Wrong Number</option><option value="Pickedup">Pickedup</option>';
    } else if(type == 'Whatsapp Message') {
        html += '<option value="No Reply">No Reply</option><option value="Not Available on WhatsApp">Not Available on WhatsApp</option>'
    } else if(type == 'Meeting') {
        html += '<option value="Discussed">Discussed</option><option value="Client Not Available">Client Not Available</option>'
    }
    $('.appendfollowStatus').append(html);
});

//Appends Next Follow up Date
$(document).on('click', '.is_follow', function() {
    $('.nextFollowDate').val('');
    $('.nextFollow').toggle(this.checked);
});

//Store Follow Ups
$(document).on('submit', '#storeFollowUps', function(e) {
    e.preventDefault();
    let formData = $(this).serialize();

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        success: function(response) {
            $('.error').text('');
            if(response.success == true) {
                toastr.success(response.message);
                location.reload();
            } else {
                toastr.error(response.message);
            }
        },
        error: function(response) {
            let errors = response.responseJSON.errors;
            $('#followTypeError').text(errors.follow_type ? errors.follow_type : '');
            $('#followStatusError').text(errors.status ? errors.status : '');
            $('#followDateError').text(errors.date ? errors.date : '');
            $('#followNoteError').text(errors.note ? errors.note : '');
            $('#followTimeError').text(errors.time ? errors.time : '');
            $('#nextFollowDateError').text(errors.next_date ? errors.next_date : '');
        }
    });
});

//Add Plan Master
$(document).on('click', '.add_plan', function() {
    var title = $('.addPlanName').val();
    if ($('.addPlanStatus').is(':checked')) {
        var status = 1;
    } else {
        var status = 0;
    }

    if(title) {
        $('.addPlanNameErr').hide();
        var btn = $(this);
        btn.addClass('loading');
        btn.attr('disabled', true);
        $.ajax({
            url: siteUrl+'/menu-management/plans',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data:{name:title, status:status},
            success: function(response) {
                btn.removeClass('loading');
                btn.attr('disabled', false);
                if(response.success == true) {
                    toastr.success(response.message);
                    setTimeout(function() {
                        location.reload();
                    }, 2000)
                } else {
                    toastr.error(response.error);
                }
            }
        })
    } else {
        $('.addPlanNameErr').show();
    }
});

//Update Plan Master
$(document).on('click', '.edit_plan_master', function() {
    var button = $(this);
    var modal = button.closest('.modal'); // Find the closest modal to the clicked button
    var id = modal.find('.plan_id').val();
    var title = modal.find('.editPlanName').val();
    var status = modal.find('.editPlanStatus').is(':checked') ? 1 : 0;

    if(id && title) {
        modal.find('.editPlanNameErr').hide();
        button.addClass('loading');
        button.attr('disabled', true);

        $.ajax({
            url: siteUrl+'/menu-management/plans/update/'+id,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: {title: title, status: status},
            success: function(response) {
                button.removeClass('loading');
                button.attr('disabled', false);

                if(response.success == true) {
                    toastr.success(response.message);

                    setTimeout(function() {
                        modal.modal('hide'); // Hide the specific modal
                        location.reload(); // Reload the page after 2 seconds
                    }, 2000); // 2000 milliseconds = 2 seconds
                } else {
                    toastr.error(response.error);
                }
            },
            error: function() {
                button.removeClass('loading');
                button.attr('disabled', false);
                toastr.error('Something went wrong.');
            }
        });
    } else {
        if (!title) {
            modal.find('.editPlanNameErr').show();
        }
    }
});

//Add Category
$(document).on('click', '.add_category', function() {
    var title = $('.addCategoryName').val();
    if ($('.addCategoryStatus').is(':checked')) {
        var status = 1;
    } else {
        var status = 0;
    }

    if(title) {
        $('.addCategoryPlanErr').hide();
        $('.addcategoryNameErr').hide();
        var btn = $(this);
        btn.addClass('loading');
        btn.attr('disabled', true);
        $.ajax({
            url: siteUrl+'/menu-management/category',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data:{title:title, status:status},
            success: function(response) {
                btn.removeClass('loading');
                btn.attr('disabled', false);
                if(response.success == true) {
                    toastr.success(response.message);
                    setTimeout(function() {
                        location.reload();
                    }, 1000)
                } else {
                    toastr.error(response.error);
                }
            }
        })
    } else {
        if(!title) {
            $('.addcategoryNameErr').show();
        } else {
            $('.addcategoryNameErr').hide();
        }
    }
});

//Update Category
$(document).on('click', '.edit_category', function() {
    var button = $(this);
    var modal = button.closest('.modal'); // Find the closest modal to the clicked button
    var id = modal.find('.category_id').val();
    var title = modal.find('.editCategoryName').val();
    var status = modal.find('.editCategoryStatus').is(':checked') ? 1 : 0;

    if(id && title) {
        modal.find('.editCategoryNameErr').hide();
        button.addClass('loading');
        button.attr('disabled', true);

        $.ajax({
            url: siteUrl+'/menu-management/category/update/'+id,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: {title: title, status: status},
            success: function(response) {
                button.removeClass('loading');
                button.attr('disabled', false);

                if(response.success == true) {
                    toastr.success(response.message);

                    setTimeout(function() {
                        modal.modal('hide'); // Hide the specific modal
                        location.reload(); // Reload the page after 2 seconds
                    }, 2000); // 2000 milliseconds = 2 seconds
                } else {
                    toastr.error(response.error);
                }
            },
            error: function() {
                button.removeClass('loading');
                button.attr('disabled', false);
                toastr.error('Something went wrong.');
            }
        });
    } else {
        if (!title) {
            modal.find('.editCategoryNameErr').show();
        } else {
            modal.find('.editCategoryNameErr').hide();
        }
    }
});

//AutoFilled Booking Create form on Lead Change
$('.lead-change').on('change', function(){
    var leadId = $(this).val();
    if(leadId) {
        $.ajax({
            url: `${siteUrl}/booking-management/fetch/lead-data`,
            method: 'GET',
            data: {leadId:leadId},
            success: function(response) {
                $('.bookingClient').val('');
                $('.bookingPhone').val('');
                $('.bookingEmail').val('');
                $('.bookingAddress').val('');
                $('.bookingEvent').val('');
                $('.bookingGuest').val('');
                $('.bookingBudget').val('');
                $('.bookingVenue').val('');
                $('.bookingEventDate').val('');
                $('.bookingEventEndDate').val('');
                $('.bookingRemark').val('');
                if(response.success == true) {
                    $('.bookingClient').val(response.data.name);
                    $('.bookingPhone').val(response.data.phone);
                    $('.bookingEmail').val(response.data.email);
                    $('.bookingAddress').val(response.data.address);
                    $('.bookingEvent').val(response.data.event).change();
                    $('.bookingGuest').val(response.data.guest);
                    $('.bookingBudget').val(response.data.budget);
                    $('.bookingVenue').val(response.data.venue);
                    $('.bookingEventDate').val(response.data.event_date);
                    $('.bookingEventEndDate').val(response.data.end_date);
                    $('.bookingRemark').val(response.data.remark);
                } else {
                    console.log(response.error);
                }
            }
        });
    }
});

//Add Unit
$('#addUnit').on('submit', function(e) {
    e.preventDefault();
    let formData = $(this).serialize();

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        success: function(response) {
            $('.error').text('');
            if(response.success == true) {
                toastr.success(response.message);
                location.reload();
            } else {
                toastr.error(response.message);
            }
        },
        error: function(response) {
            let errors = response.responseJSON.errors;
            $('#unitNameError').text(errors.unit_name ? errors.unit_name : '');
        }
    });
});

//Update Unit
$(document).on('click', '.edit_unit', function() {
    var button = $(this);
    var modal = button.closest('.modal'); // Find the closest modal to the clicked button
    var id = modal.find('.unit-id').val();
    var title = modal.find('.editUnitName').val();
    var status = modal.find('.editUnitStatus').is(':checked') ? 1 : 0;

    if(id && title) {
        modal.find('.editUnitNameError').hide();
        button.addClass('loading');
        button.attr('disabled', true);

        $.ajax({
            url: siteUrl+'/material-management/unit/update/'+id,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: {title: title, status: status},
            success: function(response) {
                button.removeClass('loading');
                button.attr('disabled', false);

                if(response.success == true) {
                    toastr.success(response.message);

                    setTimeout(function() {
                        modal.modal('hide'); // Hide the specific modal
                        location.reload(); // Reload the page after 2 seconds
                    }, 2000); // 2000 milliseconds = 2 seconds
                } else {
                    toastr.error('Something went wrong.');
                }
            },
            error: function() {
                button.removeClass('loading');
                button.attr('disabled', false);
                toastr.error('Something went wrong.');
            }
        });
    } else {
        if (!title) {
            modal.find('.editUnitNameError').show();
        }
    }
});

//Add Material Head Master
$(document).on('click', '.add_head', function() {
    var title = $('.addHeadTitle').val();
    if ($('.addHeadStatus').is(':checked')) {
        var status = 1;
    } else {
        var status = 0;
    }

    if(title) {
        $('.addHeadTitleErr').hide();
        var btn = $(this);
        btn.addClass('loading');
        btn.attr('disabled', true);
        $.ajax({
            url: siteUrl+'/material-management/head_master',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data:{title:title, status:status},
            success: function(response) {
                btn.removeClass('loading');
                btn.attr('disabled', false);
                if(response.success == true) {
                    toastr.success(response.message);
                    setTimeout(function() {
                        location.reload();
                    }, 2000)
                } else {
                    toastr.error(response.error);
                }
            }
        })
    } else {
        $('.addHeadTitleErr').show();
    }
});

//Update Head Master
$(document).on('click', '.edit_head_master', function() {
    var button = $(this);
    var modal = button.closest('.modal'); // Find the closest modal to the clicked button
    var id = modal.find('.head_id').val();
    var title = modal.find('.editHeadTitle').val();
    var status = modal.find('.editHeadStatus').is(':checked') ? 1 : 0;

    if(id && title) {
        modal.find('.editHeadTitleErr').hide();
        button.addClass('loading');
        button.attr('disabled', true);

        $.ajax({
            url: siteUrl+'/material-management/head_master/update/'+id,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: {title: title, status: status},
            success: function(response) {
                button.removeClass('loading');
                button.attr('disabled', false);

                if(response.success == true) {
                    toastr.success(response.message);

                    setTimeout(function() {
                        modal.modal('hide'); // Hide the specific modal
                        location.reload(); // Reload the page after 2 seconds
                    }, 2000); // 2000 milliseconds = 2 seconds
                } else {
                    toastr.error(response.error);
                }
            },
            error: function() {
                button.removeClass('loading');
                button.attr('disabled', false);
                toastr.error(response.error);
            }
        });
    } else {
        if (!title) {
            modal.find('.editHeadTitleErr').show();
        }
    }
});

//Add Client Payment
$(document).on('submit', '#addClientPayment', function(e) {
    e.preventDefault();
    let formData = $(this).serialize();

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        success: function(response) {
            $('.error').text('');
            if(response.success == true) {
                toastr.success(response.message);
                location.reload();
            } else {
                toastr.error(response.message);
            }
        },
        error: function(response) {
            let errors = response.responseJSON.errors;
            $('#clientPaymentError').text(errors.payment_type ? errors.payment_type : '');
            $('#clientPaidError').text(errors.amount_paid ? errors.amount_paid : '');
            $('#clientDateError').text(errors.payment_date ? errors.payment_date : '');
            $('#clientNextDateError').text(errors.next_payment_date ? errors.next_payment_date : '');
        }
    });
});

//Update Client Payment
$(document).on('submit', '#updateClientPayment', function(e) {
    e.preventDefault();
    let formData = $(this).serialize();

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        success: function(response) {
            $('.error').text('');
            if(response.success == true) {
                toastr.success(response.message);
                location.reload();
            } else {
                toastr.error(response.message);
            }
        },
        error: function(response) {
            let errors = response.responseJSON.errors;
            $('#editClientPaymentError').text(errors.payment_type ? errors.payment_type : '');
            $('#editClientPaidError').text(errors.amount_paid ? errors.amount_paid : '');
            $('#editClientDateError').text(errors.payment_date ? errors.payment_date : '');
            $('#editClientNextDateError').text(errors.next_payment_date ? errors.next_payment_date : '');
        }
    });
});

//Add Vendor Master
$(document).on('submit', '#addVendorMaster', function(e) {
    e.preventDefault();
    let formData = $(this).serialize();

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        success: function(response) {
            $('.error').text('');
            if(response.success == true) {
                toastr.success(response.message);
                location.reload();
            } else {
                toastr.error(response.message);
            }
        },
        error: function(response) {
            let errors = response.responseJSON.errors;
            $('#addVendorHeadError').text(errors.vendor_head ? errors.vendor_head : '');
            $('#addVendorNameError').text(errors.name ? errors.name : '');
            $('#addVendorNumberError').text(errors.contact_number ? errors.contact_number : '');
        }
    });
});

//Append vendor names on vendor head change
$(document).on('change', '.vendor-head-change, .party', function() {
    var headId = $('.vendor-head-change').val();
    var party = $('.party').val();

    if(headId && party) {
        $.ajax({
            url:siteUrl+'/vendor-management/vendor-ledger/fetch/vendors',
            method:'get',
            data:{head_id:headId, partyId:party},
            success: function(response) {
                console.log(response, 'bvcx');
                $('.appendVendors').empty();
                $('.vendorAmount').val('');
                if(response.success == true) {
                    var html = "<option value=''>Select</option>";
                    if((response.success == true) && (response.data.length > 0)) {
                        $.each(response.data, function(key, value) {
                            html += `<option value="${value.id}">${value.name}</option>`;
                        });
                    }
                    $('.appendVendors').html(html);
                    $('.vendorAmount').val(response.amount);
                }
            }
        })
    }
});

//Add Vendor Ledger
$(document).on('submit', '#addVendorLedger', function(e) {
    e.preventDefault();
    let formData = new FormData(this)

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            $('.error').text('');
            if(response.success == true) {
                toastr.success(response.message);
                window.location.href = response.url;
            } else {
                toastr.error(response.message);
            }
        },
        error: function(response) {
            let errors = response.responseJSON.errors;
            $('#partyError').text(errors.party ? errors.party : '');
            $('#vendorHeadError').text(errors.head ? errors.head : '');
            $('#vendorError').text(errors.vendor ? errors.vendor : '');
            $('#totalAmountError').text(errors.total_amount ? errors.total_amount : '');
            $('#advanceError').text(errors.advance ? errors.advance : '');
            $('#advanceDateError').text(errors.advance_date ? errors.advance_date : '');
            $('#billError').text(errors.file ? errors.file : '');
        }
    });
});

//Update Vendor Ledger
$(document).on('submit', '#updateVendorLedger', function(e) {
    e.preventDefault();
    let formData = new FormData(this)

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            $('.error').text('');
            if(response.success == true) {
                toastr.success(response.message);
                location.reload();
            } else {
                toastr.error(response.message);
            }
        },
        error: function(response) {
            let errors = response.responseJSON.errors;
            $('#partyError').text(errors.party ? errors.party : '');
            $('#vendorHeadError').text(errors.head ? errors.head : '');
            $('#vendorError').text(errors.vendor ? errors.vendor : '');
            $('#totalAmountError').text(errors.total_amount ? errors.total_amount : '');
            $('#advanceError').text(errors.advance ? errors.advance : '');
            $('#advanceDateError').text(errors.advance_date ? errors.advance_date : '');
            $('#billError').text(errors.file ? errors.file : '');
        }
    });
});

//Add Vendor Ledger Payment
$(document).on('submit', '#addVendorPayment', function(e) {
    e.preventDefault();
    let formData = $(this).serialize();

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        success: function(response) {
            $('.error').text('');
            if(response.success == true) {
                toastr.success(response.message);
                location.reload();
            } else {
                toastr.error(response.message);
            }
        },
        error: function(response) {
            let errors = response.responseJSON.errors;
            $('#vendorPaymentError').text(errors.payment_type ? errors.payment_type : '');
            $('#vendorPaidError').text(errors.amount_paid ? errors.amount_paid : '');
            $('#vendorDateError').text(errors.payment_date ? errors.payment_date : '');
            $('#vendorNextDateError').text(errors.next_payment_date ? errors.next_payment_date : '');
        }
    });
});

//Update Vendor Ledger Payment
$(document).on('submit', '#updateVendorPayment', function(e) {
    e.preventDefault();
    let form = $(this);
    let formData = form.serialize(); // Serialize the form data
    let modalId = form.closest('.modal').attr('id'); // Get the modal id

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        success: function(response) {
            $('.error').text('');
            if(response.success == true) {
                toastr.success(response.message);
                location.reload();
            } else {
                toastr.error(response.message);
            }
        },
        error: function(response) {
            let errors = response.responseJSON.errors;
            $(`#${modalId} #editVendorPaymentError-${modalId.split('-')[1]}`).text(errors.payment_type ? errors.payment_type : '');
            $(`#${modalId} #editVendorPaidError-${modalId.split('-')[1]}`).text(errors.amount_paid ? errors.amount_paid : '');
            $(`#${modalId} #editVendorDateError-${modalId.split('-')[1]}`).text(errors.payment_date ? errors.payment_date : '');
            $(`#${modalId} #editVendorNextDateError-${modalId.split('-')[1]}`).text(errors.next_payment_date ? errors.next_payment_date : '');
        }
    });
});
