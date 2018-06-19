import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { HealthcarePoaDocComponent } from './healthcare-poa-doc.component';

describe('HealthcarePoaDocComponent', () => {
  let component: HealthcarePoaDocComponent;
  let fixture: ComponentFixture<HealthcarePoaDocComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ HealthcarePoaDocComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(HealthcarePoaDocComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
